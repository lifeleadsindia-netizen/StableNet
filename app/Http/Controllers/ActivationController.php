<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use App\Models\PackageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ActivationController extends Controller
{
    public function accountActivation()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['package_data'] = PackageDetail::where([['memberid', $memberid], ['package_type', 'Activation']])->first();
        return view('member.account.account-activation', $result);
    }

    public function activateUser(Request $request)
    {
        $request->validate([
            'package'=>'required',
            'txn_password' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $package = $request->post('package');
        $txnid = $request->post('txn_password');
        $type = 'Activation';

        $check = MemberDetail::where('memberid', $memberid)->first();
        if ($check) {
            $memberid = $check->memberid;
            $sponsorid = $check->sponsorid;
            $name = $check->name;
            if ($package < 0) {
                session()->flash('failedMsg', 'Negative value is not allowed.');
                return redirect()->back();
            }
            if (!Hash::check($txnid, $check->txn_password)) {
                session()->flash('failedMsg', 'Entered transaction password does not match.');
                return redirect()->back();
            }
            if ($package > $check->p2p_wallet) {
                session()->flash('failedMsg', 'Not Enough balance in your Fund wallet.');
                return redirect()->back();
            }
            $check->status = 'Active';
            $check->package = $package;
            $check->activated_at = date('Y-m-d H:i:s');
            $p2p_wallet = $check->p2p_wallet;
            $check->p2p_wallet -= $package;
            $check->save();

            walletTransfer($memberid, $p2p_wallet, 'credit', $p2p_wallet, 'Account Activation', 'Member ' . $memberid . ' Account Activation ' . $p2p_wallet . ' $ deducted from P2P wallet');

            $var = new PackageDetail();
            $var->txn_date = date('Y-m-d H:i:s');
            $var->order_id = "OD" . time();
            $var->package_type = $type;
            $var->memberid = $memberid;
            $var->package_value = $package;
            $var->txnid = time();
            $var->payment_mode = 'P2p Wallet';
            $var->status = 'Accepted';
            $var->activated_by = $memberid;
            $var->save();

            // updateUpline($sponsorid, $memberid);
            // updateDownline($sponsorid);

            session()->flash('successMsg', 'Your account has been activated successfully.');
            return redirect()->back();
        }
    }


    public function activationUpgrade()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.account.upgrade-activation', $result);
    }

    public function upgradeUser(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'package' => 'required|numeric',
            'txn_password' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $package = $request->post('package');
        $txn_password = $request->post('txn_password');
        $type = 'Upgrade';

        $memUpdate = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $memUpdate->sponsorid;
        $downline = $memUpdate->downline;
        // Memberid status and existence validation
        if ($memUpdate->status != 'Active') {
            session()->flash('failedMsg', 'Your account is not activated.Please activate your account');
            return redirect()->back();
        }
        if ($package > $memUpdate->p2p_wallet) {
            session()->flash('failedMsg', 'Not enough balance. Please add funds to fund wallet');
            return redirect()->back();
        }
        if ($package < 0) {
            session()->flash('failedMsg', 'Negative value is not allowed.');
            return redirect()->back();
        }
        if ($package < $memUpdate->package) {
            session()->flash('failedMsg', 'Package must be greater than old package');
            return redirect()->back();
        }
        if (!Hash::check($txn_password, $memUpdate->txn_password)) {
            session()->flash('failedMsg', 'Entered transaction password does not match.');
            return redirect()->back();
        }
        $name = $memUpdate->name;
        $memberid = $memUpdate->memberid;
        $memUpdate->package = $package;
        $memUpdate->activated_at = date('Y-m-d H:i:s');
        $p2p_wallet = $memUpdate->p2p_wallet;
        $memUpdate->p2p_wallet -= $package;
        $memUpdate->save();

        walletTransfer($memberid, $package, 'credit', $p2p_wallet, 'Account Upgrade', 'Member ' . $memberid . ' Account Upgrade ' . $package . ' $ deducted from fund wallet');

        $var = new PackageDetail();
        $var->txn_date = date('Y-m-d H:i:s');
        $var->create = date('Y-m-d H:i:s');
        $var->order_id = "OD" . time();
        $var->package_type = $type;
        $var->memberid = $memberid;
        $var->package_value = $package;
        $var->txnid = time();
        $var->payment_mode = 'P2p Wallet';
        $var->status = 'Accepted';
        $var->activated_by = $memberid;
        $var->save();

        
        session()->flash('successMsg', 'Your account has been upgraded successfully.');
        return redirect()->back();
    }

    public function packageDetails()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['package_data'] = PackageDetail::where('memberid', $memberid)->orderBy('created_at', 'DESC')->get();
        return view('member.account.packages-details', $result);
    }

    public function memberActivation()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.account.member-activation', $result);
    }

    public function txnValidate(Request $request)
    {
        $memberid = $request->post('memberid');
        $txn_password = $request->post('txn_password');
        $amount = $request->post('amount');

        $result = MemberDetail::where('memberid', $memberid)->first();
        if ($result) {
            $pack = PackageDetail::where('memberid', $memberid)->orderBy('created_at', 'DESC')->first();
            $package = $pack->package_value;
            $hashed = $result->txn_password;
            if (Hash::check($txn_password, $hashed)) {
                if ($amount < $package) {
                    return response()->json([
                        'code' => 2,
                        'data' => 'False',
                    ]);
                } else {
                    return response()->json([
                        'code' => 1,
                        'data' => 'True',
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => 'False',
                ]);
            }
        }
    }
}
