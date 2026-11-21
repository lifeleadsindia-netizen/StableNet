<?php

use App\Models\GlobalPoolIncome;
use App\Models\GlobalPoolMatrix;
use App\Models\MemberDetail;
use App\Models\PoolUplineMember;

function SlotOneAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 1)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 1], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 1]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 1;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 1;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 1;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 1;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotTwoAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 2)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 2], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 2]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 2;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 2;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 2;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 2;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotThreeAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 3)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 3], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 3]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 3;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 3;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 3;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 3;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotFourAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 4)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 4], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 4]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 4;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 4;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 4;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 4;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotFiveAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 5)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 5], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 5]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 5;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 5;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 5;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 5;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotSixAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 6)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 6], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 6]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 6;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 6;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 6;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 6;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotSevenAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 7)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 7], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 7]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 7;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 7;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 7;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 7;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotEightAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 8)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 8], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 8]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 8;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 8;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 8;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 8;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotNineAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 9)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 9], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 9]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 9;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 9;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 9;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 9;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function SlotTenAutopool($memberid)
{
    $check = PoolUplineMember::where('pool_no', 10)->count();
    if ($check > 0) {
        $spon = GlobalPoolMatrix::where([['pool_no', 10], ['downline', '<', 2]])->orderBy('activated_at', 'asc')->first();
        $sponsorid = $spon['memberid'];
        $spon->downline += 1;
        $spon->save();

        $pool = PoolUplineMember::where([['memberid', $sponsorid], ['pool_no', 10]])->first();
        $var = new PoolUplineMember();
        $var->pool_no = 10;
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        // $var->upline_8 = $pool->upline_7;
        // $var->upline_9 = $pool->upline_8;
        // $var->upline_10 = $pool->upline_9;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = $sponsorid;
        $cmt->pool_no = 10;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    } else {
        $var = new PoolUplineMember();
        $var->pool_no = 10;
        $var->memberid = $memberid;
        $var->save();

        $cmt = new GlobalPoolMatrix();
        $cmt->memberid = $memberid;
        $cmt->sponsorid = 'Root';
        $cmt->pool_no = 10;
        $cmt->activated_at = date('Y-m-d H:i:s');
        $cmt->save();
    }
}

function AutopoolLevelIncome($memberid, $pool_no, $package)
{
    $uplines = PoolUplineMember::where([['memberid', $memberid], ['pool_no', $pool_no]])->first();
    $amount = $package / 100 * 3;

    $limit = 11;
    for ($i = 1; $i < $limit; $i++) {
        
        $upline = $uplines['upline_' . $i];
        // $capping = $package * 5;
        // $achieved = Income5xachieved($upline, $package);
        // $balance = $capping - $achieved;
        // if ($m_amount > $balance) {
        //     $amount = $balance;
        // } else {
        //     $amount = $m_amount;
        // }
        if ($upline != NULL) {
            $insert = new GlobalPoolIncome();
            $insert->pool_no = $pool_no;
            $insert->memberid = $upline;
            $insert->level = $i;
            $insert->amount = $amount;
            $insert->package = $package;
            $insert->activatingId = $memberid;
            $insert->name = getName($memberid);
            $insert->save();

            $var = MemberDetail::where('memberid', $upline)->first();
            $wallet = $var->wallet;
            $var->wallet += $amount;
            $var->save();

            walletTransfer($memberid, $amount, 'debit', $wallet, 'Slot ' . $pool_no . ' Income', 'Slot ' . $pool_no . ' ' . $i . ' Autopool Income Amount Added into wallet.');
        }
    }
}
