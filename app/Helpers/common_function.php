<?php

use App\Models\MemberDetail;

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
}