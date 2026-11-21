<?php

namespace App\Console\Commands;

use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\StackingIncome;
use Illuminate\Console\Command;

class LevelIncomeDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:level-income-dis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $incomes = StackingIncome::where([['status', 'Paid'], ['level_status', 0]])->whereDate('created_at', date('Y-m-d'))->get();
        foreach ($incomes as $value) {
            $memberid = $value['memberid'];
            $name = getName($memberid);
            $package = $value['amount'];
            $sponsorid = getSponsorid($memberid);
            $limit = 22;
            for ($i = 1; $i < $limit; $i++) {
                $level = $i;
                $m_amount = roiLevelamount($level, $package);

                if ($sponsorid != 'Root') {
                    $var = MemberDetail::where('memberid', $sponsorid)->first();
                    $status = $var->status;
                    $name = $var->name;
                    $downline = $var->downline;

                    if ($status == 'Active') {

                        $capping = capping($sponsorid);
                        $achieved = Income3xachieved($sponsorid);
                        $balance = $capping - $achieved;
                        if ($m_amount > $balance) {
                            $amount = $balance;
                        } else {
                            $amount = $m_amount;
                        }

                        if ($amount > 0) {
                            $insert = new LevelIncome();
                            $insert->memberid = $sponsorid;
                            $insert->level = $level;
                            $insert->level_id = $memberid;
                            $insert->amount = $amount;
                            $insert->package = $package;
                            $insert->name = $name;
                            $insert->downline = $downline;
                            $insert->type = 'Staking';
                             if (($level == 1 && $var->downline >= 1 || $level == 2 && $var->downline >= 2 || $level == 3 && $var->downline >= 3 || $level == 4 && $var->downline >= 4 || $level == 5 && $var->downline >= 5 || $level == 6 && $var->downline >= 6 || $level == 7 && $var->downline >= 7 || $level == 8 && $var->downline >= 8 || $level == 9 && $var->downline >= 9 || $level == 10 && $var->downline >= 10 || $level == 11 && $var->downline >= 11 || $level == 12 && $var->downline >= 12 || $level == 13 && $var->downline >= 13 || $level == 14 && $var->downline >= 14 || $level == 15 && $var->downline >= 15 || $level == 16 && $var->downline >= 16 || $level == 17 && $var->downline >= 17 || $level == 18 && $var->downline >= 18 || $level == 19 && $var->downline >= 19 || $level == 20 && $var->downline >= 20 || $level == 21 && $var->downline >= 21)) {


                                $wallet = $var->wallet;
                                $var->wallet += $amount;
                                $var->save();

                                walletTransfer($sponsorid, $amount, 'debit', $wallet, 'Level Income', '' . $i . ' Level Income Amount Added into wallet.');
                                $insert->status = 'Paid';
                            } else {
                                $insert->status = 'Flushed';
                            }

                            $insert->save();
                        }
                    }


                    $inc = MemberDetail::where('memberid', $sponsorid)->first();
                    $sponsorid = $inc['sponsorid'];
                } else {
                    break;
                }
            }
            $update = StackingIncome::where('id', $value->id)->update(['level_status' => 1]);
        }
    }
}
