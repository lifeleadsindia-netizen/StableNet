<?php

namespace App\Http\Controllers;

use App\Models\GlobalPoolIncome;
use App\Models\GlobalPoolMatrice;
use App\Models\MemberDetail;
use App\Models\PackageDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TempController extends Controller
{

    public function createTradingProfit()
    {
        $members = GlobalPoolMatrice::where('status', 'Open')->orderBy('created_at', 'ASC')->get();

        foreach ($members as $value) {
        $placement_no = $value->placement_no;
        $count = GlobalPoolMatrice::where('placement_no', '>', $placement_no)->count();
     
            if ($count >= 30) {

                $memberid = $value->memberid;
                $var = new GlobalPoolIncome();
                $var->memberid = $memberid;
                $var->pool_id = $placement_no;
                $var->buy_no = $count;
                $var->investment = 100;
                $var->profit = 20;
                $var->amount = 120;
                $var->status = 'Unpaid';
                $var->save();
                
                $update = GlobalPoolMatrice::where('placement_no', $placement_no)->update(['status' => 'Closed']);
            }
            
            
        }
    }

    public function releaseTradingProfit()
    {
        $members = GlobalPoolIncome::where('status', 'Unpaid')->get();
        foreach ($members as $value) {
            $id = $value->pool_id;

            $count = GlobalPoolMatrice::count();
            $limit = $id * 2 + 31;
            if ($count >=  $limit) {

                $memberid = $value->memberid;
                $var = GlobalPoolIncome::where('pool_id', $id)->first();
                $var->status = 'Paid';
                $amount = $var->amount;
                $var->save();

                $qry = MemberDetail::where('memberid', $memberid)->first();
                $wallet = $qry->wallet;
                $qry->wallet += $amount;
                $qry->save();

                walletTransfer($memberid, $amount, 'debit', $wallet, 'Profit trading Income', 'Profit trading Income ' . $amount . ' Added into Main Wallet. ');
            }
        }
    }

    public function fakeIds($sponsorid, $ids)
    {

        $package = 100;
        for ($i = 0; $i < $ids; $i++) {
            $amount = 100;
            $memberid = userId();

            $memUpdate = new MemberDetail();
            $memUpdate->memberid = $memberid;
            $memUpdate->name = Str::random(7);
            $memUpdate->mobile = '9886' . rand(100000, 999999);
            $memUpdate->email = Str::random(7) . '@gmail.com';
            $memUpdate->password = Hash::make(123456);
            $memUpdate->txn_password = Hash::make(123456);
            $memUpdate->wallet_address = '0xjmdfklh893476';
            $memUpdate->sponsorid = $sponsorid;
            $memUpdate->p2p_wallet = 1000;
            $memUpdate->status = 'Active';
            $memUpdate->activated_at = date('Y-m-d H:i:s');
            $memUpdate->package = $amount;
            $memUpdate->investment += $amount;
            $memUpdate->team_biz += $amount;
            $memUpdate->p2p_wallet -= $amount;
            $memUpdate->package_activated_at = date('Y-m-d H:i:s');
            $memUpdate->save();
            $name = $memUpdate->name;

            updateDownline($sponsorid);
            updateUpline($sponsorid, $memberid);

            $var = new PackageDetail();
            $var->txn_date = date('Y-m-d H:i:s');
            $var->order_id = "OD" . time();
            $var->memberid = $memberid;
            $var->package = $amount;
            $var->txnid = time();
            $var->payment_mode = 'P2p Wallet';
            $var->status = 'Accepted';
            $var->save();

            monthlyTradingBonus($memberid, $amount);
            GlobalPoolMatrice($memberid);
            levelIncome($sponsorid, $memberid, $name, $amount);
            sleep(1);
        }
    }
}
