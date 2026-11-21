<?php

use App\Http\Controllers\WithdrawalController;
use App\Models\DirectIncome;
use App\Models\GlobalPoolMatrice;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\MonthlyIncome;
use App\Models\PackageDetail;
use App\Models\ProfitDetail;
use App\Models\WalletTransfer;
use App\Models\WithdrawalIncome;

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

        for ($i = 2; $i < 16; $i++) {
            $level = $i;
            $amount = $package / 100 * 1;
            if ($sponsorid != 'Root') {
                $inc = MemberDetail::where('memberid', $sponsorid)->first();

                $downline = $inc['downline'];

                $insert = new LevelIncome();
                $insert->memberid = $sponsorid;
                $insert->level = $level;
                $insert->package = $package;
                $insert->amount = $amount;
                $insert->level_id = $memberid;
                $insert->name = $name;

                if (
                    ($level >= 1 && $level <= 5 && $downline >= 1) ||
                    ($level >= 6 && $level <= 10 && $downline >= 2) ||
                    ($level >= 11 && $level <= 15 && $downline >= 3)
                ) {
                    $insert->status = 'Paid';
                    $insert->save();

                    $var = MemberDetail::where('memberid', $sponsorid)->first();
                    $level_wallet = $var->level_wallet;
                    $var->level_wallet += $amount;
                    $var->save();

                    walletTransfer($sponsorid, $amount, 'debit', $level_wallet, 'Level Income', '' . $i . ' Level Income Amount Added into Level wallet. Payment Id-' . $insert->id);

                } else {
                    $insert->status = 'Flushed';
                    $insert->save();
                }

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

function uplineDisWithdrawal($sponsorid, $memberid, $name, $gross_amount)
{
    if ($sponsorid != 'Root') {

        for ($i = 1; $i < 6; $i++) {
            $level = $i;
            if ($sponsorid != 'Root') {
                $inc = MemberDetail::where('memberid', $sponsorid)->first();

                $amount = $gross_amount / 100 * 1;
                $withdrawal_charge = $gross_amount / 100 * 15;

                $insert = new WithdrawalIncome();
                $insert->memberid = $sponsorid;
                $insert->level = $level;
                $insert->withdrawal_charge = $withdrawal_charge;
                $insert->withdrawal_amount = $gross_amount;
                $insert->amount = $amount;
                $insert->level_id = $memberid;
                $insert->name = $name;
                $insert->type = 'Upline Income';
                $insert->status = 'Paid';
                $insert->save();

                $var = MemberDetail::where('memberid', $sponsorid)->first();
                if ($var) {
                    $wallet = $var->wallet;
                    $var->wallet += $amount;
                    $var->save();

                    walletTransfer($sponsorid, $amount, 'debit', $wallet, 'Upline Withdrawal Income', '' . $i . 'Upline Withdrawal Income Amount Added into wallet. Payment Id-' . $insert->id);
                }

                $sponsorid = $inc['sponsorid'];
            } else {
                break;
            }
        }
    }
}

function directDisWithdrawal($memberid, $name, $gross_amount)
{
    $directs = MemberDetail::where('sponsorid', $memberid)->get();

    $members = count($directs);

    if ($members > 0) {

        $total_share = ($gross_amount / 100) * 5;
        $withdrawal_charge = ($gross_amount / 100) * 15;
        $amount = $total_share / $members;

        foreach ($directs as $direct) {
            $insert = new WithdrawalIncome();
            $insert->memberid = $direct->memberid;
            $insert->level = 1;
            $insert->level_id = $memberid;
            $insert->name = $name;
            $insert->share = $total_share;
            $insert->amount = $amount;
            $insert->withdrawal_charge = $withdrawal_charge;
            $insert->withdrawal_amount = $gross_amount;
            $insert->type = 'Direct Income';
            $insert->status = 'Paid';
            $insert->save();

            $wallet = $direct->wallet;
            $direct->wallet += $amount;
            $direct->save();

            walletTransfer(
                $direct->memberid,
                $amount,
                'debit',
                $wallet,
                'Direct Withdrawal Income',
                'Direct Withdrawal Income Added. Payment Id-' . $insert->id
            );
        }
    }
}
