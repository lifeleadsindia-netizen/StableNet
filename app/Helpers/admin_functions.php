<?php

use App\Models\GlobalPoolIncome;
use App\Models\GlobalPoolMatrice;
use App\Models\ImportFund;
use App\Models\LevelIncome;
use App\Models\DirectIncome;
use App\Models\WithdrawalIncome;
use App\Models\RewardIncome;
use App\Models\MemberDetail;
use App\Models\MonthlyIncome;
use App\Models\PackageDetail;
use App\Models\WithdrawalRequest;
use PHPUnit\Framework\Constraint\Count;

function totalMembersadmin()
{
    $count = MemberDetail::all();
    return count($count);
}

function totalActiveMembers()
{
    $count = MemberDetail::where('status', 'Active')->count();
    return $count;
}

function totalTempMembers()
{
    $count = MemberDetail::where('status', 'Temp')->count();
    return $count;
}

function totalblockedMembers()
{
    $count = MemberDetail::where('status', 'Blocked')->count();
    return $count;
}

function todaysWithdrawal()
{
    $sum = WithdrawalRequest::where([['status', 'Approved'], ['payment_date', date('Y-m-d')]])->sum('gross_amount');
    return $sum;
}

function totalWithdrawal()
{
    $sum = WithdrawalRequest::where('status', 'Approved')->sum('gross_amount');
    return $sum;
}

function TodayinWallet()
{
    $sum = MemberDetail::where('status', 'Active')->whereDate('created_at', date('Y-m-d'))->sum('wallet');
    return $sum;
}

function totalinWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('wallet');
    return $sum;
}

function totalinFundWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('p2p_wallet');
    return $sum;
}

function totalinlevelWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('level_wallet');
    return $sum;
}

function totalInc()
{
    $total = totalLevelInc() + totalDirectInc() + totalGlobalPoolInc() + totalWithdrawalInc() + totalRewardInc();
    return $total;
}

function totalLevelInc()
{
    $var = LevelIncome::where('status', 'Paid')->sum('amount');
    return $var;
}

function totalDirectInc()
{
    $var = DirectIncome::where('status', 'Paid')->sum('amount');
    return $var;
}

function totalGlobalPoolInc()
{
    $var = GlobalPoolIncome::where('status', 'Paid')->sum('amount');
    return $var;
}

function totalWithdrawalInc()
{
    $var = WithdrawalIncome::where('status', 'Paid')->sum('amount');
    return $var;
}

function totalRewardInc()
{
    $var = RewardIncome::where('status', 'Paid')->sum('amount');
    return $var;
}

function totalgrossAmount()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('gross_amount');
    return $count;
}

function totalnetAmount()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('net_amount');
    return $count;
}

function totaldeductions()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('service_charge');
    return $count;
}

function totalFundImported()
{
    $count = ImportFund::where([['status', 'Approved'], ['added_by', 'Admin']])->sum('amount');
    return $count;
}

function todayInc()
{
    $total = todayLevelInc() + todayDirectInc() + todayGlobalPoolInc() + todayWithdrawalInc() + todayRewardInc();
    return $total;
}

function todayLevelInc()
{
    $var = LevelIncome::where('status', 'Paid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayDirectInc()
{
    $var = DirectIncome::where('status', 'Paid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayGlobalPoolInc()
{
    $var = GlobalPoolIncome::where('status', 'Paid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayWithdrawalInc()
{
    $var = WithdrawalIncome::where('status', 'Paid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todayRewardInc()
{
    $var = RewardIncome::where('status', 'Paid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function totalpackageValue()
{
    $var = PackageDetail::where('status', 'Accepted')->sum('package');
    return $var;
}

function totalpoolMember()
{
    $count = GlobalPoolMatrice::all();
    return Count($count);
}
