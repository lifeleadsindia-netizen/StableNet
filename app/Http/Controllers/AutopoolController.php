<?php

namespace App\Http\Controllers;

use App\Models\GlobalPoolIncome;
use App\Models\MemberDetail;
use App\Models\PoolUplineMember;
use Illuminate\Http\Request;

class AutopoolController extends Controller
{
    public static function getPoolSlots(): array
    {
        return [
            1  => ['id' => 1,  'value' => 5,     'name' => 'Slot 1 ($5)',       'price' => '$5'],
            2  => ['id' => 2,  'value' => 15,    'name' => 'Slot 2 ($15)',      'price' => '$15'],
            3  => ['id' => 3,  'value' => 50,    'name' => 'Slot 3 ($50)',      'price' => '$50'],
            4  => ['id' => 4,  'value' => 100,   'name' => 'Slot 4 ($100)',     'price' => '$100'],
            5  => ['id' => 5,  'value' => 300,   'name' => 'Slot 5 ($300)',     'price' => '$300'],
            6  => ['id' => 6,  'value' => 500,   'name' => 'Slot 6 ($500)',     'price' => '$500'],
            7  => ['id' => 7,  'value' => 1000,  'name' => 'Slot 7 ($1,000)',   'price' => '$1,000'],
            8  => ['id' => 8,  'value' => 3000,  'name' => 'Slot 8 ($3,000)',   'price' => '$3,000'],
            9  => ['id' => 9,  'value' => 5000,  'name' => 'Slot 9 ($5,000)',   'price' => '$5,000'],
            10 => ['id' => 10, 'value' => 10000, 'name' => 'Slot 10 ($10,000)', 'price' => '$10,000'],
        ];
    }

    public function globelpoolIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['Data'] = GlobalPoolIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'DESC')->get();
        return view('member.globalpool.global-pool-income')->with($result);
    }

    public function globelpoolMember($pool = 1, $value = 5)
    {
        $memberid = session('MEMBER_ID');
        $pool = (int) $pool;
        if ($pool < 1 || $pool > 10) {
            $pool = 1;
        }

        $slots = self::getPoolSlots();
        $currentSlot = $slots[$pool] ?? $slots[1];
        $value = $currentSlot['value'];

        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['pool_data'] = PoolUplineMember::where([['upline_1', $memberid], ['pool_no', $pool]])->get();
        $result['pool'] = $pool;
        $result['value'] = $value;
        $result['slots'] = $slots;
        $result['currentSlot'] = $currentSlot;
        return view('member.globalpool.global-pool-member')->with($result);
    }

    public function globalpoolMatrix($id = 1)
    {
        $id = (int) $id;
        if ($id < 1 || $id > 10) {
            $id = 1;
        }

        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $memberid = $result['data']['memberid'];
        $slots = self::getPoolSlots();
        $currentSlot = $slots[$id] ?? $slots[1];

        $array = [];
        $income = [];
        $amount = getPoolAmount($id);
        for ($i = 1; $i < 11; $i++) {
            $upline = 'upline_' . $i;
            $array[$i] = PoolUplineMember::where([['pool_no', $id], [$upline, $memberid]])->count();
            if ($array[$i] > 0) {
                $income[$i] = $array[$i] * $amount;
            } else {
                $income[$i] = 0;
            }
        }
        $result['array'] = $array;
        $result['amount'] = $income;
        $result['pool'] = $currentSlot['value'];
        $result['pool_id'] = $id;
        $result['slots'] = $slots;
        $result['currentSlot'] = $currentSlot;
        $result['poolAmount'] = $amount;
        return view('member.globalpool.global-pool-matrix')->with($result);
    }
}
