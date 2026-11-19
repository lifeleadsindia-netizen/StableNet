<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\RewardIncome;
use Illuminate\Console\Command;

class RewardRankGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reward-rank-generation';

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
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 0 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 500 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 500 ) {

                    $r_amount = 20;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Second rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 1 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 1500 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 1500 ) {

                    $r_amount = 40;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Red Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Red Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Third rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 2 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 4000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 4000 ) {

                    $r_amount = 100;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Blue Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Blue Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Fourth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 3 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 9000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 9000 ) {

                    $r_amount = 200;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Silver Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Silver Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Fifth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 4 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 19000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 19000 ) {

                    $r_amount = 400;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Paral Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Paral Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Sixth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 5 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 44000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 44000 ) {

                    $r_amount = 1000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Gold Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Gold Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Seventh rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 6 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 94000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 94000 ) {

                    $r_amount = 2000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Platinum Star';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Platinum Star';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Eight rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 7 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 194000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 194000 ) {

                    $r_amount = 4000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Ruby';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Ruby';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Ninth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 8 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 444000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 444000 ) {

                    $r_amount = 10000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Emerald';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Emerald';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Tenth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 9 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 944000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 944000 ) {

                    $r_amount = 20000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Sapphire';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Sapphire';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //ELevnth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 10 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 1944000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 1944000 ) {

                    $r_amount = 40000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Diamond';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Diamond';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Twelth rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 11 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 4444000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 4444000 ) {

                    $r_amount = 100000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'White Diamond';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'White Diamond';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Thirteen rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 12 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 9444000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 9444000 ) {

                    $r_amount = 500000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Black Diamond';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Black Diamond';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Fourteen rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 13 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 19444000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 19444000 ) {

                    $r_amount = 1000000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Royal Diamond';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Royal Diamond';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }

        //Fifteen rank income
        $members = MemberDetail::where( [ [ 'status', 'Active' ], [ 'downline', '>=', 2 ], [ 'rank_status', 14 ] ] )->get();
        foreach ( $members as $value ) {
            $memberid = $value[ 'memberid' ];
            $first = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->first();
            if ( $first->team_biz >= 44444000 ) {
                $first_memb = $first[ 'memberid' ];
                $second = MemberDetail::where( [ [ 'sponsorid', $memberid ], [ 'memberid', '!=', $first_memb ], [ 'status', 'Active' ] ] )->orderBy( 'team_biz', 'DESC' )->sum( 'team_biz' );

                if ( $second >= 44444000 ) {

                    $r_amount = 2000000;
                    $capping = capping( $memberid );
                    $achieved = Income3xachieved( $memberid );
                    $balance = $capping - $achieved;
                    if ( $balance <= $r_amount ) {
                        $amount = $balance;
                    } else {
                        $amount = $r_amount;
                    }

                    if ( $amount > 0 ) {

                        $new = new RewardIncome();
                        $new->memberid = $memberid;
                        $new->team_biz = $value[ 'team_biz' ];
                        $new->rank = 'Ambassador';
                        $new->amount = $amount;
                        $new->status = 'Paid';
                        $new->save();

                        $update = MemberDetail::find( $value->id );
                        $update->rank = 'Ambassador';
                        $update->rank_status += 1;

                        $wallet = $update->wallet;
                        $update->wallet += $amount;
                        $update->save();

                        walletTransfer( $memberid, $amount, 'debit', $wallet, 'Reward Income', 'Reward Income amount has been transfered into wallet.' );
                    }
                }
            }
        }
    }
}
