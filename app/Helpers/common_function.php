<?php

use App\Models\MemberDetail;
use App\Models\PoolUplineMember;

function getDirectCount($memberid)
{
     $directCount = MemberDetail::where('sponsorid', $memberid)->count();
     return $directCount;
}

function getLevelData($memberid)
{
    $directs = MemberDetail::where('sponsorid', $memberid)->get();
    return $directs;
}

function team_biz_update($sponsorid, $value)
{
    $limit = 16;
    for ($i = 1; $i < $limit; $i++) {
        if ($sponsorid != 'Root') {
            $query = MemberDetail::where('memberid', $sponsorid)->first();
            $query->team_biz += $value;
            $query->save();
            $sponsorid = $query->sponsorid;
        }
    }
}function getPoolAmount($id)
{
    if ($id == 1) {
        $amount = 5 / 100 * 3;
    } elseif ($id == 2) {
        $amount = 15 / 100 * 3;
    } elseif ($id == 3) {
        $amount = 50 / 100 * 3;
    } elseif ($id == 4) {
        $amount = 100 / 100 * 3;
    } elseif ($id == 5) {
        $amount = 300 / 100 * 3;
    } elseif ($id == 6) {
        $amount = 500 / 100 * 3;
    } elseif ($id == 7) {
        $amount = 1000 / 100 * 3;
    } elseif ($id == 8) {
        $amount = 3000 / 100 * 3;
    } elseif ($id == 9) {
        $amount = 5000 / 100 * 3;
    } elseif ($id == 10) {
        $amount = 10000 / 100 * 3;
    } else {
        $amount = 0;
    }

    return $amount;
}

function getPoolDirectCount($memberid, $pool)
{
     $directCount = PoolUplineMember::where([['upline_1', $memberid],['pool_no',$pool]])->count();
     return $directCount;
}

function getPoolLevelData($memberid, $pool)
{
    $directs = PoolUplineMember::where([['upline_1', $memberid],['pool_no',$pool]])->get();
    return $directs;
}