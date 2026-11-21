<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\SalaryIncome;
use App\Models\TotalSalaryIncome;
use Illuminate\Console\Command;

class RoyalityWeeklyIncomeDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:royality-weekly-income-dis';

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
        // Weekly Salary
        $incomes = TotalSalaryIncome::where( [ [ 'status', 'Active' ], [ 'type', 'Weekly' ], [ 'week_installment', '<', 60 ], [ 'pay_date', date( 'Y-m-d' ) ] ] )->get();
        foreach ( $incomes as $value ) {
            $memberid = $value->memberid;
            $var = MemberDetail::where( 'memberid', $memberid )->first();

            if ( $var->status == 'Active' ) {
                $rank = $var->rank;
                $m_amount = $value->amount;
                $week_installment = $value->week_installment + 1;

                $capping = capping( $memberid );
                $achieved = Income3xachieved( $memberid );
                $balance = $capping - $achieved;
                if ( $m_amount > $balance ) {
                    $amount = $balance;
                } else {
                    $amount = $m_amount;
                }

                if ( $amount > 0 ) {

                    $qry = new SalaryIncome();
                    $qry->start_date = date( 'Y-m-d' );
                    $qry->memberid = $memberid;
                    $qry->rank = $rank;
                    $qry->volume = $value->volume;
                    $qry->week_installment = $week_installment;
                    $qry->amount = $amount;
                    $qry->status = 'Paid';
                    $qry->save();

                    $update = TotalSalaryIncome::find( $value[ 'id' ] );
                    $update->week_installment = $week_installment;
                    $update->paid_amount += $amount;
                    $update->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    if ( $week_installment == 60 || $m_amount > $balance ) {
                        $update->status = 'Deactive';
                    }
                    $update->save();

                    $wallet = $var->wallet;
                    $var->wallet += $amount;
                    $var->save();

                    walletTransfer( $memberid, $amount, 'debit', $wallet, 'Salary Income', 'Salary Income amount has been transfered into wallet.' );
                } else {
                    $update = TotalSalaryIncome::find( $value[ 'id' ] );
                    $update->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $update->save();
                }
            }
        }

         // Monthly Salary
         $incomes = TotalSalaryIncome::where( [ [ 'status', 'Active' ], [ 'type', 'Monthly' ],[ 'pay_date', date( 'Y-m-d' ) ] ] )->get();
         foreach ( $incomes as $value ) {
             $memberid = $value->memberid;
             $var = MemberDetail::where( 'memberid', $memberid )->first();
 
             if ( $var->status == 'Active' ) {
                 $rank = $var->rank;
                 $m_amount = $value->amount;
                 $week_installment = $value->week_installment + 1;
 
                 $capping = capping( $memberid );
                 $achieved = Income3xachieved( $memberid );
                 $balance = $capping - $achieved;
                 if ( $m_amount > $balance ) {
                     $amount = $balance;
                 } else {
                     $amount = $m_amount;
                 }
 
                 if ( $amount > 0 ) {
 
                     $qry = new SalaryIncome();
                     $qry->start_date = date( 'Y-m-d' );
                     $qry->memberid = $memberid;
                     $qry->rank = $rank;
                     $qry->volume = $value->volume;
                     $qry->week_installment = $week_installment;
                     $qry->amount = $amount;
                     $qry->status = 'Paid';
                     $qry->save();
 
                     $update = TotalSalaryIncome::find( $value[ 'id' ] );
                     $update->week_installment = $week_installment;
                     $update->paid_amount += $amount;
                     $update->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                     if ( $m_amount > $balance ) {
                         $update->status = 'Deactive';
                     }
                     $update->save();
 
                     $wallet = $var->wallet;
                     $var->wallet += $amount;
                     $var->save();
 
                     walletTransfer( $memberid, $amount, 'debit', $wallet, 'Salary Income', 'Salary Income amount has been transfered into wallet.' );
                 } else {
                     $update = TotalSalaryIncome::find( $value[ 'id' ] );
                     $update->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                     $update->save();
                 }
             }
         }

    }
}
