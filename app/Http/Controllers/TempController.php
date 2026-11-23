<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use App\Models\RewardIncome;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TempController extends Controller
{

    // public function rewardStatusUpdate()
    // {
    //     $package5 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 12.5
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 37.5
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 125,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 250,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 1250,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 2500,
    //         ],
    //     ];
    //     $package15 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 37.5
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 112.5
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 375,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 750,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 3750,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 7500,
    //         ],
    //     ];
    //     $package50 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 125
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 375
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 1250,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 2500,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 12500,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 25000,
    //         ],
    //     ];
    //     $package100 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 250
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 750
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 2500,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 5000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 25000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 50000,
    //         ],
    //     ];
    //     $package300 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 750
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 2250
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 7500,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 15000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 75000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 150000,
    //         ],
    //     ];
    //     $package500 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 1250
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 3750
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 12500,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 25000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 125000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 250000,
    //         ],
    //     ];
    //     $package1000 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 2500
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 7500
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 25000,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 50000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 250000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 500000,
    //         ],
    //     ];
    //     $package3000 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 7500
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 22500
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 75000,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 150000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 750000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 1500000,
    //         ],
    //     ];
    //     $package5000 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 12500
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 37500
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 125000,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 250000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 1250000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 2500000,
    //         ],
    //     ];
    //     $package10000 = [
    //         [
    //             'status' => 0,
    //             'count' => 50,
    //             'amount' => 25000
    //         ],
    //         [
    //             'status' => 1,
    //             'count' => 200,
    //             'amount' => 75000
    //         ],
    //         [
    //             'status' => 2,
    //             'count' => 700,
    //             'amount' => 250000,
    //         ],
    //         [
    //             'status' => 3,
    //             'count' => 1700,
    //             'amount' => 500000,
    //         ],
    //         [
    //             'status' => 4,
    //             'count' => 6700,
    //             'amount' => 2500000,
    //         ],
    //         [
    //             'status' => 5,
    //             'count' => 16700,
    //             'amount' => 5000000,
    //         ],
    //     ];

    //     $members = MemberDetail::where('status', 'Active')->get();
    //     foreach ($members as $value) {
    //         $memberid = $value->memberid;
    //         $package = $value->package;
    //         $amount = $package5['amount'];
    //         $count = totalMembers($memberid, $package);

    //         if ($count >= 100) {

    //             $insert = new RewardIncome();
    //             $insert->memberid = $memberid;
    //             $insert->package = $package;
    //             $insert->members = $count;
    //             $insert->amount = $amount;
    //             $insert->status = 'Paid';
    //             $insert->save();

    //             $wallet = $value->wallet;
    //             $value->wallet += $amount;
    //             $value->save();

    //             walletTransfer(
    //                 $memberid,
    //                 $amount,
    //                 'debit',
    //                 $wallet,
    //                 'Reward Income',
    //                 'Reward Income Amount Added into Wallet.'
    //             );
    //         }
    //     }
    // }


    public function rewardStatusUpdate()
    {
        // Maximum execution time target: 58 seconds
        $startTime = microtime(true);
        $maxExecutionTime = 58;
        
        $rewards = [
            5 => [
                ['status' => 0, 'count' => 50, 'amount' => 12.5],
                ['status' => 1, 'count' => 200, 'amount' => 37.5],
                ['status' => 2, 'count' => 700, 'amount' => 125],
                ['status' => 3, 'count' => 1700, 'amount' => 250],
                ['status' => 4, 'count' => 6700, 'amount' => 1250],
                ['status' => 5, 'count' => 16700, 'amount' => 2500],
            ],

            15 => [
                ['status' => 0, 'count' => 50, 'amount' => 37.5],
                ['status' => 1, 'count' => 200, 'amount' => 112.5],
                ['status' => 2, 'count' => 700, 'amount' => 375],
                ['status' => 3, 'count' => 1700, 'amount' => 750],
                ['status' => 4, 'count' => 6700, 'amount' => 3750],
                ['status' => 5, 'count' => 16700, 'amount' => 7500],
            ],

            50 => [
                ['status' => 0, 'count' => 50, 'amount' => 125],
                ['status' => 1, 'count' => 200, 'amount' => 375],
                ['status' => 2, 'count' => 700, 'amount' => 1250],
                ['status' => 3, 'count' => 1700, 'amount' => 2500],
                ['status' => 4, 'count' => 6700, 'amount' => 12500],
                ['status' => 5, 'count' => 16700, 'amount' => 25000],
            ],

            100 => [
                ['status' => 0, 'count' => 50, 'amount' => 250],
                ['status' => 1, 'count' => 200, 'amount' => 750],
                ['status' => 2, 'count' => 700, 'amount' => 2500],
                ['status' => 3, 'count' => 1700, 'amount' => 5000],
                ['status' => 4, 'count' => 6700, 'amount' => 25000],
                ['status' => 5, 'count' => 16700, 'amount' => 50000],
            ],

            300 => [
                ['status' => 0, 'count' => 50, 'amount' => 750],
                ['status' => 1, 'count' => 200, 'amount' => 2250],
                ['status' => 2, 'count' => 700, 'amount' => 7500],
                ['status' => 3, 'count' => 1700, 'amount' => 15000],
                ['status' => 4, 'count' => 6700, 'amount' => 75000],
                ['status' => 5, 'count' => 16700, 'amount' => 150000],
            ],

            500 => [
                ['status' => 0, 'count' => 50, 'amount' => 1250],
                ['status' => 1, 'count' => 200, 'amount' => 3750],
                ['status' => 2, 'count' => 700, 'amount' => 12500],
                ['status' => 3, 'count' => 1700, 'amount' => 25000],
                ['status' => 4, 'count' => 6700, 'amount' => 125000],
                ['status' => 5, 'count' => 16700, 'amount' => 250000],
            ],

            1000 => [
                ['status' => 0, 'count' => 50, 'amount' => 2500],
                ['status' => 1, 'count' => 200, 'amount' => 7500],
                ['status' => 2, 'count' => 700, 'amount' => 25000],
                ['status' => 3, 'count' => 1700, 'amount' => 50000],
                ['status' => 4, 'count' => 6700, 'amount' => 250000],
                ['status' => 5, 'count' => 16700, 'amount' => 500000],
            ],

            3000 => [
                ['status' => 0, 'count' => 50, 'amount' => 7500],
                ['status' => 1, 'count' => 200, 'amount' => 22500],
                ['status' => 2, 'count' => 700, 'amount' => 75000],
                ['status' => 3, 'count' => 1700, 'amount' => 150000],
                ['status' => 4, 'count' => 6700, 'amount' => 750000],
                ['status' => 5, 'count' => 16700, 'amount' => 1500000],
            ],

            5000 => [
                ['status' => 0, 'count' => 50, 'amount' => 12500],
                ['status' => 1, 'count' => 200, 'amount' => 37500],
                ['status' => 2, 'count' => 700, 'amount' => 125000],
                ['status' => 3, 'count' => 1700, 'amount' => 250000],
                ['status' => 4, 'count' => 6700, 'amount' => 1250000],
                ['status' => 5, 'count' => 16700, 'amount' => 2500000],
            ],

            10000 => [
                ['status' => 0, 'count' => 50, 'amount' => 25000],
                ['status' => 1, 'count' => 200, 'amount' => 75000],
                ['status' => 2, 'count' => 700, 'amount' => 250000],
                ['status' => 3, 'count' => 1700, 'amount' => 500000],
                ['status' => 4, 'count' => 6700, 'amount' => 2500000],
                ['status' => 5, 'count' => 16700, 'amount' => 5000000],
            ],
        ];


        foreach ($rewards as $package => $slots) {

            foreach ($slots as $reward) {

                // Stop before cron timeout
                if ((microtime(true) - $startTime) >= $maxExecutionTime) {
                    return;
                }

                $rewardStatus = $reward['status'];
                $requiredCount = $reward['count'];
                $amount = $reward['amount'];

                $cacheKey = "reward_progress_{$package}_{$rewardStatus}";
                $lastId = Cache::get($cacheKey, 0);

                // Separate query for each package and reward slot
                $completed = MemberDetail::where('status', 'Active')
                    ->where('package', $package)
                    ->where('id', '>', $lastId)

                    // Exclude already paid slot members
                    ->whereNotExists(function ($query) use ($rewardStatus, $package) {

                        $query->select(DB::raw(1))
                            ->from('reward_incomes')
                            ->whereColumn(
                                'reward_incomes.memberid',
                                'member_details.memberid'
                            )
                            ->where('reward_incomes.package', $package)
                            ->where('reward_incomes.reward_status', $rewardStatus)
                            ->where('reward_incomes.status', 'Paid');
                    })

                    // Process members in batches
                    ->chunkById(100, function ($members) use (
                        $package,
                        $rewardStatus,
                        $requiredCount,
                        $amount,
                        $startTime,
                        $maxExecutionTime,
                        $cacheKey
                    ) {

                        foreach ($members as $value) {

                            // Stop safely at 58 seconds
                            if ((microtime(true) - $startTime) >= $maxExecutionTime) {
                                return false;
                            }

                            $memberid = $value->memberid;

                            // Calculate member count
                            $count = totalMembers($memberid, $package);

                            if ($count >= $requiredCount) {
                                DB::transaction(function () use (
                                    $value,
                                    $memberid,
                                    $package,
                                    $count,
                                    $amount,
                                    $rewardStatus
                                ) {

                                    // Lock member wallet row
                                    $member = MemberDetail::where('id', $value->id)
                                        ->lockForUpdate()
                                        ->first();

                                    if (!$member) {
                                        return;
                                    }

                                    // Double check duplicate reward
                                    $alreadyPaid = RewardIncome::where('memberid', $memberid)
                                        ->where('package', $package)
                                        ->where('reward_status', $rewardStatus)
                                        ->where('status', 'Paid')
                                        ->exists();

                                    if ($alreadyPaid) {
                                        return;
                                    }

                                    $wallet = $member->wallet;

                                    $insert = new RewardIncome();
                                    $insert->memberid = $memberid;
                                    $insert->package = $package;
                                    $insert->members = $count;
                                    $insert->amount = $amount;
                                    $insert->reward_status = $rewardStatus;
                                    $insert->status = 'Paid';
                                    $insert->save();

                                    $member->wallet += $amount;
                                    $member->save();

                                    walletTransfer(
                                        $memberid,
                                        $amount,
                                        'debit',
                                        $wallet,
                                        'Reward Income',
                                        'Reward Income Amount Added into Wallet.'
                                    );
                                });
                            }

                            // Save last processed member ID in Cache
                            Cache::put($cacheKey, $value->id);
                        }
                    }, 'id');

                if ($completed) {
                    Cache::put($cacheKey, 0);
                }

                // Check time before next slot
                if ((microtime(true) - $startTime) >= $maxExecutionTime) {
                    return;
                }
            }
        }
    }
}
