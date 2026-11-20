<?php

use App\Models\DirectIncome;
use App\Models\GlobalPoolMatrice;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\MonthlyIncome;
use App\Models\PackageDetail;
use App\Models\ProfitDetail;
use App\Models\WalletTransfer;

function walletTransfer($memberid, $amount, $type, $wallet, $walletType, $text)
{
    if ($type == 'debit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->debit = $amount;
        $ins->balance = $wallet + $amount;
        $ins->particular = $text;
        $ins->save();
    } elseif ($type == 'credit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->credit = $amount;
        $ins->balance = $wallet - $amount;
        $ins->particular = $text;
        $ins->save();
    }
}

function p2pwalletTransfer($memberid, $amount, $type, $p2pwallet, $walletType, $text)
{
    if ($type == 'debit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->debit = $amount;
        $ins->balance = $p2pwallet + $amount;
        $ins->particular = $text;
        $ins->save();
    } elseif ($type == 'credit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->credit = $amount;
        $ins->balance = $p2pwallet - $amount;
        $ins->particular = $text;
        $ins->save();
    }
}

function levelIncome($sponsorid, $memberid, $name, $package)
{
    if ($sponsorid != 'Root') {

        for ($i = 2; $i < 15; $i++) {
            $level = $i;
            $amount = $package / 100 * 1;
            if ($sponsorid != 'Root') {
                $inc = MemberDetail::where('memberid', $sponsorid)->first();

                $insert = new LevelIncome();
                $insert->memberid = $sponsorid;
                $insert->level = $level;
                $insert->package = $package;
                $insert->amount = $amount;
                $insert->level_id = $memberid;
                $insert->name = $name;
                $insert->status = 'Paid';
                $insert->save();

                $var = MemberDetail::where('memberid', $sponsorid)->first();
                $level_wallet = $var->level_wallet;
                $var->level_wallet += $amount;
                $var->save();

                walletTransfer($sponsorid, $amount, 'debit', $level_wallet, 'Level Income', '' . $i . ' Level Income Amount Added into Level wallet. Payment Id-' . $insert->id);

                $sponsorid = $inc['sponsorid'];
            } else {
                break;
            }
        }
    }
}


function directIncome($sponsorid, $memberid, $name, $package, $type)
{
    while ($sponsorid != 'Root' && !empty($sponsorid)) {

        $var = MemberDetail::where('memberid', $sponsorid)
            ->where('status', 'Active')
            ->first();

        if (!$var) {
            break;
        }

        $sponPackage = $var->package;

        if ($sponPackage >= $package) {

            $rate = 50;
            $amount = ($package * $rate) / 100;

            if ($amount > 0) {

                $insert = new DirectIncome();
                $insert->memberid = $sponsorid;
                $insert->amount = $amount;
                $insert->activatingId = $memberid;
                $insert->package = $package;
                $insert->type = $type;
                $insert->name = $name;
                $insert->status = 'Paid';
                $insert->save();

                // Wallet update
                $wallet = $var->wallet;
                $var->wallet += $amount;
                $var->save();

                walletTransfer(
                    $sponsorid,
                    $amount,
                    'debit',
                    $wallet,
                    'Direct Referral Income',
                    'Direct Referral Income Amount Added into wallet.'
                );
            }

            return true;
        }
        $sponsorid = $var->sponsorid;
    }

    return false;
}


// function levelamount($level, $package)
// {

//     if ($level == 1) {
//         $amount = $package / 100 * 10;
//     } elseif ($level == 2) {
//         $amount = $package / 100 * 3;
//     } elseif ($level == 3) {
//         $amount = $package / 100 * 2;
//     } elseif ($level == 4) {
//         $amount = $package / 100 * 1.5;
//     } elseif ($level == 5) {
//         $amount = $package / 100 * 1.5;
//     } elseif ($level == 6) {
//         $amount = $package / 100 * 1;
//     } elseif ($level == 7) {
//         $amount = $package / 100 * 1;
//     }

//     return $amount;
// }


function profitDetails($memberid, $name)
{
    $inc = GlobalPoolMatrice::where('memberid', $memberid)->orderBy('created_at', 'DESC')->first();
    $sponsorid = $inc['sponsorid'];
    if ($sponsorid != 'Root') {
        for ($i = 1; $i < 31; $i++) {
            $level = $i;
            $amount = 20 / 30;
            if ($sponsorid != 'Root') {
                $inc = GlobalPoolMatrice::where('memberid', $sponsorid)->first();

                $insert = new ProfitDetail();
                $insert->memberid = $sponsorid;
                $insert->pool_id = $inc->id;
                $insert->level = $level;
                $insert->amount = $amount;
                $insert->downline_id = $memberid;
                $insert->name = $name;
                $insert->total_amount = $level * $amount;
                $insert->save();

                $sponsorid = $inc['sponsorid'];
            } else {
                break;
            }
        }
    }
}

function monthlyTradingBonus($memberid, $package)
{
    $startDate = date('Y-m-01');
    $lastDate = date('Y-m-d', strtotime('+1 Day'));
    $count = PackageDetail::where('memberid', $memberid)->whereBetween('created_at', [$startDate, $lastDate])->count();
    if ($count % 2 == 0) {
        if ($count == 2) {
            $amount = 1;
        } elseif ($count == 4) {
            $amount = 3;
        } elseif ($count == 6) {
            $amount = 4;
        } elseif ($count == 8) {
            $amount = 4;
        } elseif ($count >= 10) {
            $amount = 4;
        }
        $var = new MonthlyIncome();
        $var->memberid = $memberid;
        $var->package = $package;
        $var->buy_no = $count;
        $var->amount = $amount;
        $var->status = 'Paid';
        $var->save();

        $qry = MemberDetail::where('memberid', $memberid)->first();
        $wallet = $qry->wallet;
        $qry->wallet += $amount;
        $qry->save();

        walletTransfer($memberid, $amount, 'debit', $wallet, 'Monthly Trading Bonus', 'Monthly Trading Bonus ' . $amount . ' Added into Main Wallet. ');
    }
}

function GlobalPoolMatrice($memberid)
{

    $startDate = date('Y-m-01');
    $lastDate = date('Y-m-d', strtotime('+1 Day'));
    $count = PackageDetail::where('memberid', $memberid)->whereBetween('created_at', [$startDate, $lastDate])->count();
    $total = GlobalPoolMatrice::count();

    $sponsor = GlobalPoolMatrice::orderBy('created_at', 'DESC')->first();

    $cmt = new GlobalPoolMatrice();
    $cmt->memberid = $memberid;
    if (isset($sponsor)) {
        $cmt->sponsorid = $sponsor->memberid;
    } else {
        $cmt->sponsorid = 'Root';
    }
    $cmt->placement_no = $total + 1;
    $cmt->buy_no = $count;
    $cmt->activated_at = date('Y-m-d H:i:s');
    $cmt->save();

    return $cmt->id;
}
