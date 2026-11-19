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