<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\StackingIncome;
use App\Models\StakingDetail;
use App\Models\SetRate;
use Illuminate\Console\Command;

class DailyIncomeDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-income-dis';

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
        // if (date('D') != 'Sat' && date('D') != 'Sun') {
        $stakings = StakingDetail::where([['close_date', '>=', date('Y-m-d')], ['status', 'Active']])->get();
        $pack_rate = SetRate::find(1);
        foreach ($stakings as $value) {
            $memberid = $value->memberid;
            $memUpdate = MemberDetail::where('memberid', $memberid)->first();
            if($memUpdate->status == 'Active'){
                if($value->package_name == 'Silver'){
                $rate = $pack_rate->rate;
                } elseif($value->package_name == 'Gold'){
                     $rate = $pack_rate->rate_1;
                } elseif($value->package_name == 'Diamond'){
                     $rate = $pack_rate->rate_2;
                } elseif($value->package_name == 'Crown'){
                     $rate = $pack_rate->rate_3;
                }
                
                $installment = $value->installments + 1;
                $stak_amount = ($value->invest_amount / 100 * $rate) / 30;
    
             
                $capping = capping($memberid);
                $achieved = Income3xachieved($memberid);
                $balance = $capping - $achieved;
                if ($balance <= $stak_amount) {
                    $amount = $balance;
                } else {
                    $amount = $stak_amount;
                }
    
                if ($amount > 0) {
    
                    $qry = new StackingIncome();
                    $qry->date = date('Y-m-d');
                    $qry->memberid = $memberid;
                    $qry->total_investment = $value->invest_amount;
                    $qry->rate = $rate;
                    $qry->amount = $amount;
                    $qry->installment =  $installment;
                    $qry->status = 'Paid';
                    $qry->save();
    
                    $wallet = $memUpdate->wallet;
                    $memUpdate->wallet += $amount;
                    $memUpdate->save();
    
                    walletTransfer($memberid, $amount, 'debit', $wallet, 'Profit Income', 'Profit Income amount has been transfered into wallet.');
    
                    $update = StakingDetail::where('id', $value->id)->first();
                    $update->installments += 1;
                    if ($balance <= $stak_amount) {
                        $update->status = 'Deactive';
                    }
                    $update->save();
    
                } else {
                    $update = StakingDetail::where('id', $value->id)->first();
                    $update->status = 'Deactive';
                    $update->save();
                }
            }
        }
        // }
    }
}
