<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\TotalSalaryIncome;
use Illuminate\Console\Command;

class RoyalityRankGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:royality-rank-generation';

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
        //First rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 0 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 25000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 25000 ) {

                    $amount = 10;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $new->volume = 25000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Weekly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Second rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 1 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 50000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 50000 ) {
                    
                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 20;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $new->volume = 50000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Weekly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Third rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 2 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 175000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 175000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 40;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $new->volume = 175000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Weekly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Fourth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 3 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 425000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 425000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 100;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $new->volume = 425000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Weekly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Fifth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 4 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 925000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 925000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 200;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+7 days' ) );
                    $new->volume = 925000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Weekly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Sixth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 5 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 1925000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 1925000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 4000;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                    $new->volume = 1925000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Monthly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Seventh rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 6 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 4425000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 4425000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 10000;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                    $new->volume = 4425000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Monthly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //Eight rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 7 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 9425000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 9425000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 40000;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                    $new->volume = 9425000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Monthly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //nine rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 8 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 19425000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 19425000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 80000;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                    $new->volume = 19425000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Monthly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

        //ten rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'salary_status', 9 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 44425000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 44425000 ) {

                    $update = TotalSalaryIncome::where( [ [ 'memberid', $memberid ], [ 'status', 'Active' ] ] )->update(['status' => 'Deactive']);
                    
                    $amount = 200000;
                    $new = new TotalSalaryIncome();
                    $new->memberid = $memberid;
                    $new->pay_date = date( 'Y-m-d', strtotime( '+30 days' ) );
                    $new->volume = 44425000;
                    $new->amount =  $amount;
                    $new->week_installment = 0;
                    $new->type = 'Monthly';
                    $new->status = 'Active';
                    $new->save();

                    $update = MemberDetail::find( $value->id );
                    $update->salary_status += 1;
                    $update->save();
                }
            }
        }

    }
}
