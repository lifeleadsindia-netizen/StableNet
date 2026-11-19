<?php

namespace App\Http\Controllers;

use App\Models\GlobalPoolMatrice;
use App\Models\MemberDetail;
use App\Models\PackageDetail;
use App\Models\ProfitDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StakingController extends Controller
{
    public function buyCoin()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $date = $result['data']['package_activated_at'];
        $current_time = date('Y-m-d H:i:s');
        // $result['current_time'] = strtotime($current_time);
        $current = strtotime($current_time);
        $end_time = date('Y-m-d H:i:s', strtotime($date . '+24 Hours'));
        // $result['end_time'] = strtotime($end_time);
        $end = strtotime($end_time);
        $balance = $current / $end;
        if ($balance > 1) {
            $result['balance'] = $current / $end;
        } else {
            $result['balance'] = 0;
        }
        if ($date != NULL) {
            $result['rest'] = date('Y-m-d H:i:s', strtotime($date . '+24 Hours'));
        } else {
            $result['rest'] = 0;
        }

        return view('member.investment.investment-create', $result);
    }

    public function createStaking(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required',
            'txn_password' => 'required'
        ]);

        $memberid = session('MEMBER_ID');
        $amount = $request->post('amount');
        $txn_password = $request->post('txn_password');

        $memUpdate = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $memUpdate->sponsorid;
        $p2p_wallet = $memUpdate->p2p_wallet;
        $date = $memUpdate->package_activated_at;
        $current_time = date('Y-m-d H:i:s');
        $end_time = date('Y-m-d H:i:s', strtotime($date . '+24 Hours'));

        $name = $memUpdate->name;
        $type = 'By User';


        if ($amount < 100) {
            session()->flash('failedMsg', '*** This amount is not allowed');
            return redirect()->back();
        }

        if ($p2p_wallet < $amount) {
            session()->flash('failedMsg', 'There is no enough balance in your wallet to stake this amount');
            return redirect()->back();
        }

        // if ($date != NULL && $current_time <= $end_time) {
        //     session()->flash('failedMsg', '*** Coins can be bought only after 24 hours of last coins buy');
        //     return redirect()->back();
        // }
        ;
        if (PackageCount($memberid) >= 10) {
            session()->flash('failedMsg', 'You already have 10 open trades.');
            return redirect()->back();
        }

        if (!Hash::check($txn_password, $memUpdate->txn_password)) {
            session()->flash('failedMsg', 'Entered transaction password does not match.');
            return redirect()->back();
        }

        $var = new PackageDetail();
        $var->txn_date = date('Y-m-d H:i:s');
        $var->order_id = "OD" . time();
        $var->memberid = $memberid;
        $var->package = $amount;
        $var->txnid = time();
        $var->payment_mode = 'P2p Wallet';
        $var->status = 'Accepted';
        $var->save();

        if ($memUpdate->status == 'Temp') {
            $memUpdate->status = 'Active';
            $memUpdate->activated_at = date('Y-m-d H:i:s');
            updateDownline($sponsorid);
            updateUpline($sponsorid, $memberid);
        }
        $memUpdate->package = $amount;
        $memUpdate->investment += $amount;
        $memUpdate->team_biz += $amount;
        $memUpdate->p2p_wallet -= $amount;
        $memUpdate->package_activated_at = date('Y-m-d H:i:s');
        $memUpdate->save();

        walletTransfer($memberid, $amount, 'credit', $p2p_wallet, 'Buy Coins', 'Buy Coins amount has been deducted from wallet');

        monthlyTradingBonus($memberid, $amount);
        $pid = GlobalPoolMatrice($memberid);
        levelIncome($sponsorid, $memberid, $name, $amount);
        profitDetails($memberid, $name, $pid);

        session()->flash('successMsg', 'Coins have been buy successfully.');
        return redirect()->back();
    }

    public function investmentDetails()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $memberid = $result['data']['memberid'];
        $result['sdata'] = PackageDetail::where('memberid', $memberid)->orderby('created_at', 'desc')->get();
        return view('member.investment.investment-details')->with($result);
    }

    public function tradeDetails()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $result['sdata'] = GlobalPoolMatrice::where('memberid', $memberid)->orderby('created_at', 'asc')->get();
        return view('member.trade.trade-details')->with($result);
    }

    public function detailedIncome($tid)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $result['sdata'] = ProfitDetail::where('pool_id', $tid)->get();
        return view('member.trade.income-details')->with($result);
    }

}
