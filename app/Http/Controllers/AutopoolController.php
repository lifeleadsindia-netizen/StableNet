<?php

namespace App\Http\Controllers;

use App\Models\GlobalPoolIncome;
use App\Models\MemberDetail;
use App\Models\PoolUplineMember;
use Illuminate\Http\Request;

class AutopoolController extends Controller
{
    public function globelpoolIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['Data'] = GlobalPoolIncome::where('memberid', $result['data']['memberid'])->orderby('amount', 'ASC')->get();
        return view('member.globalpool.global-pool-income')->with($result);
    }

    public function globelpoolMember($pool, $value)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['pool_data'] = PoolUplineMember::where([['upline_1', $memberid], ['pool_no', $pool]])->get();
        $result['pool'] = $pool;
        $result['value'] = $value;
        return view('member.globalpool.global-pool-member')->with($result);
    }

    public function globalpoolMatrix($id)
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $memberid = $result['data']['memberid'];
        $array = [];
        $income = [];
        $amount = getPoolAmount($id);
        for ($i = 1; $i < 11; $i++) {
            $upline = 'upline_' . $i;
            $array[$i] = PoolUplineMember::where([['pool_no', $id], [$upline, $memberid]])->count();
            if ($array[$i] > 0) {
                $income[$i] =  $array[$i] * $amount;
            } else {
                $income[$i] = 0;
            }
        }
        $result['array'] = $array;
        $result['amount'] = $income;
        $result['pool'] = $amount * 50;
        return view('member.globalpool.global-pool-matrix')->with($result);
    }
}
