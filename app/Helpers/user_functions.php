<?php

use App\Models\ImportFund;
use App\Models\GlobalPoolIncome;
use App\Models\GlobalPoolMatrice;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\MonthlyIncome;
use App\Models\WithdrawalRequest;
use App\Models\TicketText;
use App\Models\PackageDetail;
use App\Models\UplineMember;
use App\Models\ProfitDetail;
use App\Models\SupportTicket;


function userId()
{
    $userid = "SN" . rand(1000000, 9999999);
    $member = MemberDetail::where('memberid', $userid)->count();
    if ($member > 0) {
        userId();
    } else {
        return $userid;
    }
}

function getName($memberid)
{
    $var = MemberDetail::where('memberid', $memberid)->first();
    return $var['name'];
}

function getAllData($memberid)
{
    $var = MemberDetail::where('memberid', $memberid)->first();
    return $var;
}

function AdmUnread($ticketid)
{
    $count = TicketText::where([['ticket_id', $ticketid], ['written_by', 'Admin'], ['status', 'Unread']])->count();
    if ($count > 0) {
        return $count;
    } else {
        return 0;
    }
}
function userUnread($ticketid)
{
    $count = TicketText::where([['ticket_id', $ticketid], ['written_by', 'Member'], ['status', 'Unread']])->count();
    if ($count > 0) {
        return $count;
    } else {
        return 0;
    }
}

function updateDownline($sponsorid)
{
    if ($sponsorid != 'Root') {
        $var = MemberDetail::where('memberid', $sponsorid)->first();
        $var->downline += 1;
        $var->save();
    }
}

function updateUpline($sponsorid, $memberid)
{
    if ($memberid != 'SN1234567') {
        $pool = UplineMember::where('memberid', $sponsorid)->first();
        $var = new UplineMember();
        $var->memberid = $memberid;
        $var->upline_1 = $pool->memberid;
        $var->upline_2 = $pool->upline_1;
        $var->upline_3 = $pool->upline_2;
        $var->upline_4 = $pool->upline_3;
        $var->upline_5 = $pool->upline_4;
        $var->upline_6 = $pool->upline_5;
        $var->upline_7 = $pool->upline_6;
        $var->save();
    }
}

function totalIncome($memberid)
{
    $total = totalLevelIncome($memberid) + totalTradingProfit($memberid) + totalTradingBonus($memberid);
    return $total;
}

function totalLevelIncome($memberid)
{
    $var = LevelIncome::where([['status', 'Paid'], ['memberid', $memberid]])->sum('amount');
    return $var;
}

function totalTradingProfit($memberid)
{
    $var = GlobalPoolIncome::where([['status', 'Paid'], ['memberid', $memberid]])->sum('amount');
    return $var;
}

function totalTradingBonus($memberid)
{
    $var = MonthlyIncome::where([['status', 'Paid'], ['memberid', $memberid]])->sum('amount');
    return $var;
}


function totalDownlines($memberid)
{
    $members = MemberDetail::where('sponsorid', $memberid)->count();
    return $members;
}

function todayWithdrawals($memberid)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved']])->whereDate('created_at', date('Y-m-d'))->sum('gross_amount');
    return $var;
}

function totalWithdrawals($memberid)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved']])->sum('gross_amount');
    return $var;
}

function totalsingleLevel($memberid, $level)
{
    $upline = 'upline_' . $level;
    $var = UplineMember::where($upline, $memberid)->count();
    return $var;
}

function getSponsorid($memberid)
{
    $var = MemberDetail::where('memberid', $memberid)->first();
    return $var['sponsorid'];
}

function todayDeposit($memberid)
{
    $var = ImportFund::where([['memberid', $memberid], ['status', 'Approved']])->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayIncome($memberid)
{
    $total = todayLevelIncome($memberid)  + todayTradingProfit($memberid) + todayTradingBonus($memberid);
    return $total;
}

function todayLevelIncome($memberid)
{
    $var = LevelIncome::where([['status', 'Paid'], ['memberid', $memberid]])->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayTradingProfit($memberid)
{
    $var = GlobalPoolIncome::where([['status', 'Paid'], ['memberid', $memberid]])->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayTradingBonus($memberid)
{
    $var = MonthlyIncome::where([['status', 'Paid'], ['memberid', $memberid]])->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function totalDeposit($memberid)
{
    $var = ImportFund::where([['memberid', $memberid], ['status', 'Approved']])->sum('amount');
    return $var;
}

function totalLevelMembers($memberid)
{
    $members = MemberDetail::where('sponsorid', $memberid)->pluck('memberid');
    $total = count($members);
    while (count($members) != 0) {
        $members = MemberDetail::whereIn('sponsorid', $members)->pluck('memberid');
        $total += count($members);
    }
    return $total;
}

function levelMembersCount($memberid, $level)
{
    $i = 2;
    $total = 0;
    if ($level == 1) {
        $members = MemberDetail::where('sponsorid', $memberid)->pluck('memberid');
        $total = count($members);
    } else {
        $members = MemberDetail::where('sponsorid', $memberid)->pluck('memberid');
        while (count($members) != 0) {
            $members = MemberDetail::whereIn('sponsorid', $members)->pluck('memberid');
            $total = count($members);
            if ($level == $i) {
                break;
            }
            $i++;
        }
    }
    return $total;
}

function PackageCount($memberid)
{
    $count = GlobalPoolMatrice::where([['memberid', $memberid],['status','Open']])->count();
    return $count;
}

function getPoolCount($id)
{
      $count = GlobalPoolMatrice::where('id', '>', $id)->count();
      return $count;
}

function getProfileImage($ticket_id)
{
    $ticket = SupportTicket::where('ticket_id', $ticket_id)->first();
    $memberid = $ticket->memberid;
    $var = MemberDetail::where('memberid', $memberid)->first();
    return $var['profile_image'];
}

// function getTotalProfit($id)
// {
//       $sum = ProfitDetail::where('pool_id', $id)->sum('amount');
//       return $sum;
// }

function getCurrentTrade($memberid)
{
        $count = GlobalPoolMatrice::where([['memberid', $memberid], ['status', 'Open']])->count();
        $var = GlobalPoolMatrice::where([['memberid', $memberid], ['status', 'Open']])->get();
        $total = 0;
        for ($i=0; $i < $count; $i++) { 
            $sum = ProfitDetail::where('pool_id', $var[$i]->id)->sum('amount');
            $total += $sum;
        }
        return $count * 100 + $total;
}

function getTotalTrade($memberid)
{
        $count = GlobalPoolMatrice::where('memberid', $memberid)->count();
        $var = GlobalPoolMatrice::where('memberid', $memberid)->get();
        $total = 0;
        for ($i=0; $i < $count; $i++) { 
            $sum = ProfitDetail::where('pool_id', $var[$i]->id)->sum('amount');
            $total += $sum;
        }
        return $count * 100 + $total;
}


