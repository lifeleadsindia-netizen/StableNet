<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\MemberDetail;
use App\Models\GlobalPoolMatrice;
use App\Models\WalletTransfer;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WithdrawalController extends Controller
{
    public function mainWallets()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.wallet.main-wallet')->with($result);
    }

    public function initWithdrawal(Request $request)
    {
        $request->validate([
            'wallet_type' => 'required',
            'amount' => 'required',
            'txn_password' => 'required',
        ]);
        $wallet_type = 'Income Wallet';
        $txnPass = $request->post('txn_password');
        $amount = $request->post('amount');
        $memberid = session('MEMBER_ID');

        $service = ($amount / 100) * 15;

        $netAmount = $amount - $service;
        $totalAmount = $amount;
        $date = date('Y-m-d H:i:s');
        $requestid = "RQ" . time();

        $mem = MemberDetail::where('memberid', $memberid)->first();
        $wallet = $mem->wallet;
        $level_wallet = $mem->level_wallet;
        $tPassword = $mem['txn_password'];
        if ($mem['wallet_address'] == '' || $mem['wallet_address'] == null) {
            session()->flash('failedMsg', 'Your wallet address is not completed. Plase fill your wallet address before withdrawal');
            return redirect()->back();
        }

        $check = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Pending']])->count();
        if ($check > 0) {
            session()->flash('failedMsg', 'Your Last Withdrawal Still Pending. Please Wait');
            return redirect()->back();
        }

        if ($mem->status != 'Active') {
            session()->flash('failedMsg', 'Your account is not activated.');
            return redirect()->back();
        }

        if ($amount < 1) {
            session()->flash('failedMsg', 'Invalid Amount Entered. Amount must be at least $1');
            return redirect()->back();
        }

        // if ($amount > 500) {
        //     session()->flash('failedMsg', 'Invalid Amount Entered. Amount must be less than 500$');
        //     return redirect()->back();
        // }

        // if (date('D') != 'Sun') {
        //     session()->flash('failedMsg', 'Withdrawal is allowed on every Sunday');
        //     return redirect()->back();
        // }


        if (!Hash::check($txnPass, $tPassword)) {
            session()->flash('failedMsg', 'Enter Transaction password do not match. Please check and try again');
            return redirect()->back();
        }

        if ($amount > $wallet) {
            session()->flash('failedMsg', 'Invalid Amount Entered. Amount can not be greater than wallet balance');
            return redirect()->back();
        }
        $mem->wallet -= $totalAmount;
        walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Withdrawal', ' $ ' . $totalAmount . ' have been withdrawn by Member from wallet.');
        session()->flash('successMsg', 'Amount has been transferred to your wallet successfully.');
        $mem->save();

        $var = new WithdrawalRequest();
        $var->request_date = $date;
        $var->request_id = $requestid;
        $var->memberid = $memberid;
        $var->name = $mem->name;
        $var->type = 'Online';
        $var->wallet_type = $wallet_type;
        $var->wallet_address = $mem->wallet_address;
        $var->gross_amount = $totalAmount;
        $var->service_charge = $service;
        $var->net_amount = $netAmount;
        $var->save();

        return redirect()->back();
    }

    public function withdrawalaccept(Request $request, $id)
    {
        $aid = session('ADMIN_ID');
        $result['adm_data'] = Admin::find($aid);
        $result['data'] = WithdrawalRequest::find($id);
        return view('admin.withdrawal-accept')->with($result);
    }

    //   public function sendWdlRequest(Request $request)
    // {
    //     $memberid = $request->post('memberid');
    //     $wallet = $request->post('wallet');
    //     $net_amount = $request->post('net_amount');
    //     $wid = $request->post('wid');
    //     $jwt = getJWttoken();

    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.nowpayments.io/v1/payout',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => '{
    //         "ipn_callback_url": "https://nowpayments.io",
    //         "withdrawals": [
    //             {
    //                 "address": "' . $wallet . '",
    //                 "currency": "USDTBSC",
    //                 "amount": ' . $net_amount . ',
    //                 "ipn_callback_url": "https://nowpayments.io"
    //             }
    //         ]
    //     }',
    //         CURLOPT_HTTPHEADER => array(
    //             'x-api-key: SMTPFBH-PWWMV92-NV6ENZF-KM5GJF3',
    //             'Content-Type: application/json',
    //             'Authorization: Bearer ' . $jwt . ''
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     $data = json_decode($response, true);
    //     // print_r($data);
    //     if($data['id'] ){
    //         $var = WithdrawalRequest::find($wid);
    //         $var->batch_withdrawal_id = $data['withdrawals'][0]['batch_withdrawal_id'];
    //         $var->status = $data['withdrawals'][0]['status'];
    //         $var->save();

    //         $type = $var->type;
    //         if ($type == 'Alexa') {
    //             session()->flash('wMessage', 'Withdrawal request has been created successfully!. Status is ' . $var->status . '');
    //             return redirect('admin/new-withdrawal-request');
    //         } else {
    //             session()->flash('wMessage', 'Withdrawal request has been created successfully!. Status is ' . $var->status . '');
    //             return redirect('admin/new-withdrawal-request');
    //         }

    //     } else{
    //         session()->flash('wMessage', 'Insufficient balance in wallet. Please add funds');
    //         return redirect('admin/new-withdrawal-request');
    //     }

    // }

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
    
    public function profitWithdrawal(Request $request, $id)
    {
        $qry = GlobalPoolMatrice::find($id);
        $memberid = $qry->memberid;
        if ($qry->status == 'Open') {
            if (getPoolCount($id) < 32) {
                session()->flash('failedMsg', 'You need 32 direct referrals to withdraw from this matrix.');
                return redirect()->back();
            }
            $mem = MemberDetail::where('memberid', $memberid)->select(['memberid', 'name', 'wallet_address'])->first();
            if ($mem['wallet_address'] == '' || $mem['wallet_address'] == null) {
                session()->flash('failedMsg', 'Your wallet address is not completed. Please fill your wallet address');
                return redirect()->back();
            }
            $amount = 120;
            $service = $amount / 100 * 4;
            $netAmount = $amount - $service;
            $totalAmount = $amount;
            $date = date('Y-m-d H:i:s');
            $requestid = "RQ" . time();

            $var = new WithdrawalRequest();
            $var->request_date = $date;
            $var->request_id = $requestid;
            $var->memberid = $memberid;
            $var->name = $mem->name;
            $var->type = 'Profit';
            $var->wallet_address = $mem->wallet_address;
            $var->gross_amount = $totalAmount;
            $var->service_charge = $service;
            $var->net_amount = $netAmount;
            $var->save();

            $qry->status = 'Closed';
            $qry->save();

            session()->flash('successMsg', 'Withdrawal request has been created successfully.');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'This matrix is already closed.');
            return redirect()->back();
        }
    }
}
