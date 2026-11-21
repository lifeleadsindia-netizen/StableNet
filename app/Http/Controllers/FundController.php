<?php

namespace App\Http\Controllers;

use App\Models\FundRequest;
use App\Models\ImportFund;
use App\Models\MemberDetail;
use App\Models\NowpaymentPayment;
use App\Models\PaymentData;
use App\Models\PaymentDetail;
use App\Models\WalletTransfer;
use App\Models\SetRate;
use Illuminate\Support\Str;
use App\Models\TmcCoin;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FundController extends Controller
{
    public function depositFund()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['rate'] = SetRate::find(1);
        $result['usdt_data'] = PaymentDetail::where([['address', '!=', NULL], ['status', 'Live']])->first();
        return view('member.fund.deposit-fund')->with($result);
    }

    public function addFund(Request $request)
    {

        $memberid = $request->post('memberid');
        $txnid = $request->post('txnid');
        $amount = $request->post('amount');
        $data = MemberDetail::where('memberid', $memberid)->first();

        $var = new ImportFund();
        $var->memberid = $memberid;
        $var->orderid = "OD" . time();
        $var->amount = $amount;
        $var->txnid = $txnid;
        $var->type = 'Add';
        $var->mode = 'Online';
        $var->status = 'Approved';
        $var->added_by = 'User';
        $var->wallet_type = 'P2P Wallet';
        $var->save();

        $wallet = $data->p2p_wallet;
        $data->p2p_wallet += $amount;
        $data->save();
        p2pwalletTransfer($memberid, $amount, 'debit', $wallet, 'Fund Added', '' . $amount . ' USDT added to fund wallet');
    }

    public function FundReq(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required',
            'txnid' => 'required',
            'image' => 'required'
        ]);

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Invalid amount input. Please change amount value');
            return redirect()->back();
        }

        if (checkTxnid($request->post('txnid')) == 1) {
            session()->flash('failedMsg', 'This transaction id has already been used. Please change transaction id');
            return redirect()->back();
        }

        $var = new FundRequest();
        $var->date = date('Y-m-d');
        $var->memberid = $request->post('memberid');
        $var->amount = $request->post('amount');
        $var->type = 'USDT';
        $var->tran_id = $request->post('txnid');
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = 'txn' . time() . '.' . $ext;
        $file->move(public_path('uploads'), $filename);
        $var->image = $filename;
        $var->status = 'Requested';
        $var->save();

        session()->flash('successMsg', 'Your request has been created successfully.');
        return redirect()->back();
    }

    public function USDTFundReq(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|numeric',
            'txnid' => 'required',
            'image' => 'required'
        ]);

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Invalid amount input. Please change amount value');
            return redirect()->back();
        }

        if ($request->post('amount') < 1) {
            session()->flash('failedMsg', 'Amount must be greater than or equal to $1');
            return redirect()->back();
        }

        if (checkTxnid($request->post('txnid')) == 1) {
            session()->flash('failedMsg', 'This transaction id has already been used. Please change transaction id');
            return redirect()->back();
        }

        $var = new FundRequest();
        $var->date = date('Y-m-d');
        $var->memberid = $request->post('memberid');
        $var->amount = $request->post('amount');
        $var->type = 'USDT';
        $var->tran_id = $request->post('txnid');
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = 'txn' . time() . '.' . $ext;
        $file->move(public_path('uploads/qr-code'), $filename);
        $var->image = $filename;
        $var->status = 'Requested';
        $var->save();

        session()->flash('successMsg', 'Your request has been created successfully.');
        return redirect()->back();
    }

    public function depositFundHis(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['addfundData'] = ImportFund::where('memberid', $memberid)->orderBy('created_at', 'desc')->get();
        return view('member.fund.deposit-fund-history')->with($result);
    }

    public function withdrlHistory()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['reqdata'] = WithdrawalRequest::where('memberid', $memberid)->orderBy('created_at', 'desc')->get();
        return view('member.wallet.withdrawal-history')->with($result);
    }

    public function walletTransfer()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['transdata'] = WalletTransfer::where([['memberid', $memberid], ['walletType', '!=', 'P2P Fund Transfer']])->orderBy('id', 'desc')->get();
        return view('member.wallet.wallet-transfer')->with($result);
    }

    public function acceptReq(Request $request, $id)
    {
        $var = FundRequest::find($id);
        $memberid = $var->memberid;
        $amount = $var->amount;
        $var->status = 'Accepted';
        $var->save();


        $qry = MemberDetail::where('memberid', $memberid)->first();
        $p2pwallet = $qry->p2p_wallet;
        $qry->p2p_wallet += $amount;
        $qry->save();

        p2pwalletTransfer($memberid, $amount, 'debit', $p2pwallet, 'P2P Fund Transfer', 'Fund requested transfered into user fund wallet');
        session()->flash('successMsg', 'Fund request has been accepted successfully');
        return redirect()->back();
    }

    public function rejectReq(Request $request, $id)
    {
        $var = FundRequest::find($id);
        $var->status = 'Cancelled';
        $var->save();

        session()->flash('successMsg', 'Fund request has been rejected successfully');
        return redirect()->back();
    }

    public function activationWallet()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2pWallet.activation-wallet')->with($result);
    }

    public function fundTrans(Request $request)
    {
        $request->validate([
            'txn_password' => 'required',
            'amount' => 'required|numeric',
            'memberid' => 'required'
        ]);

        $memberid = strtoupper($request->post('memberid'));
        $senderid = session('MEMBER_ID');
        $txn_password = $request->post('txn_password');
        $amount = $request->post('amount');
        if ($amount < 0) {
            session()->flash('failedMsg', 'Invalid Amount Input');
            return redirect()->back();
        }
        if ($amount < 1) {
            session()->flash('failedMsg', 'Invalid Amount Entered. Amount must be grater than 1$');
            return redirect()->back();
        }
        $check = MemberDetail::where('memberid', $memberid)->first();
        if (!$check) {
            session()->flash('failedMsg', 'Entered Memberid is not registered with us');
            return redirect()->back();
        }
        $check = MemberDetail::where([['memberid', $memberid], ['status', 'Temp']])->first();
        if (!$check) {
            session()->flash('failedMsg', 'Your id is not Active');
            return redirect()->back();
        }
        if ($memberid == $senderid) {
            session()->flash('failedMsg', 'You can not transfer money to your own account');
            return redirect()->back();
        }
        $var = MemberDetail::where('memberid', $senderid)->first();
        if ($amount > $var->p2p_wallet) {
            session()->flash('failedMsg', 'You do not have enough balance to transfer');
            return redirect()->back();
        }
        if (!Hash::check($txn_password, $var->txn_password)) {
            session()->flash('failedMsg', 'Enter Transaction password do not match. Please check and try again');
            return redirect()->back();
        }
        $qry = MemberDetail::where('memberid', $memberid)->first();
        $p2p_wallet = $qry->p2p_wallet;
        $qry->p2p_wallet += $amount;
        $qry->save();
        p2pwalletTransfer($memberid, $amount, 'debit', $p2p_wallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred to your Fund wallet by ' . $senderid . '');

        $senderwallet = $var->p2p_wallet;
        $var->p2p_wallet -= $amount;
        $var->save();

        p2pwalletTransfer($senderid, $amount, 'credit', $senderwallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred by you to ' . $memberid . ' Fund wallet');

        session()->flash('successMsg', 'Amount has been transferred successfully');
        return redirect()->back();
    }

    public function activationWalletHistory()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2pWallet.activation-wallet-history')->with($result);
    }

    public function walletToP2P(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member/wallet/wallet-to-p2p')->with($result);
    }

    public function walletP2Phistory()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'Wallet to p2p Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.wallet.wallet-p2p-history')->with($result);
    }

    public function walletP2pTransfer(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'txn_password' => 'required'
        ]);

        $memberid = strtoupper($request->post('sender'));
        // $senderid = $request->post('sender');
        $var = MemberDetail::where('memberid', $memberid)->first();
        $balance = $var->wallet;
        $txn_password = $request->post('txn_password');
        $amount = $request->post('amount');
        $txnpassword = $var->txn_password;

        $service = $amount / 100 * 5;
        $netAmount = $amount - $service;

        if ($amount > $balance) {
            session()->flash('failedMsg', 'You do not have enough balance to transfer this amount ');
            return redirect()->back();
        } elseif ($amount < 0) {
            session()->flash('failedMsg', 'Negative value is not allowed');
            return redirect()->back();
        }
        if (!Hash::check($txn_password, $txnpassword)) {
            session()->flash('failedMsg', 'Entered Transaction Password donot match');
            return redirect()->back();
        }

        $p2p_wallet = $var->p2p_wallet;
        $var->p2p_wallet += $netAmount;
        $wallet = $var->wallet;
        $var->wallet -= $amount;
        $var->save();

        p2pwalletTransfer($memberid, $netAmount, 'debit', $p2p_wallet, 'Wallet to p2p Transfer', '$ ' . $netAmount . ' has been transferred to your P2P wallet');
        walletTransfer($memberid, $amount, 'credit', $wallet, 'Wallet to p2p Transfer', '$ ' . $amount . ' has been deducted from your wallet');

        session()->flash('successMsg', 'Amount has been transferred successfully');
        return redirect()->back();
    }


}
