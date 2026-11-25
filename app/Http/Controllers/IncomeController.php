<?php

namespace App\Http\Controllers;

use App\Models\DirectIncome;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\RankIncome;
use App\Models\RoyaltyIncome;
use App\Models\StackingIncome;
use App\Models\SalaryIncome;
use App\Models\MonthlyIncome;
use App\Models\TotalLevelIncome;
use App\Models\DailyDirectIncome;
use App\Models\GlobalPoolIncome;
use App\Models\RewardIncome;
use App\Models\WithdrawalIncome;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function rewardIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['rewData'] = RewardIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.reward.reward-income')->with($result);
    }

    public function rewardDetails(Request $request)
    {
        $memberId = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberId)->first();
        if (!$result['data']) {
            $result['data'] = MemberDetail::where('status', 'Active')->first();
        }

        // Reward disbursement structure from TempController::rewardIncomeDis()
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

        $memberPackage = (int) ($result['data']->package ?? 0);
        $selectedPackage = (int) $request->get('package', $memberPackage > 0 ? $memberPackage : 5);
        if (!array_key_exists($selectedPackage, $rewards)) {
            $selectedPackage = 5;
        }

        $currentCount = 0;
        $upline1Count = 0;
        $upline2Count = 0;
        if (!empty($result['data']->memberid)) {
            $currentCount = totalMembers($result['data']->memberid, $selectedPackage);
            $upline1Count = totalUpline1Members($result['data']->memberid, $selectedPackage);
            $upline2Count = totalUpline2Members($result['data']->memberid, $selectedPackage);
        }

        $paidRewards = collect();
        if (!empty($result['data']->memberid)) {
            $paidRewards = RewardIncome::where('memberid', $result['data']->memberid)
                ->where('status', 'Paid')
                ->get()
                ->keyBy('reward_status');
        }

        $result['rewards'] = $rewards;
        $result['selectedPackage'] = $selectedPackage;
        $result['memberPackage'] = $memberPackage;
        $result['currentCount'] = $currentCount;
        $result['upline1Count'] = $upline1Count;
        $result['upline2Count'] = $upline2Count;
        $result['rewardTiers'] = $rewards[$selectedPackage];

        return view('member.reward.reward-details')->with($result);
    }

    public function royaltyIncomes()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['royaltyData'] = SalaryIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.royalty.royalty-incomes')->with($result);
    }

    public function royaltyDetails()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        return view('member.royalty.royalty-details')->with($result);
    }


    public function directIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['directData'] = DirectIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.income.direct-income')->with($result);
    }

    public function globalAutoPoolIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['profitData'] = GlobalPoolIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.income.profit-income')->with($result);
    }

    public function directIncomeDetailed($id)
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['directData'] = DailyDirectIncome::where('income_id', $id)->orderby('created_at', 'desc')->get();
        return view('member.income.direct-income-detailed')->with($result);
    }

    public function levelDetails()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['levelData'] = TotalLevelIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.income.level-details')->with($result);
    }

    public function levelIncomes()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['levelData'] = LevelIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.income.level-income')->with($result);
    }

    public function withdrawalIncomes()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        try {
            $result['directData'] = WithdrawalIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $result['directData'] = [];
        }
        $result['levelData'] = $result['directData'];
        return view('member.income.withdrawal-income')->with($result);
    }

    public function rankIncome()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
        $result['rankData'] = RankIncome::where('memberid', $result['data']['memberid'])->orderby('created_at', 'desc')->get();
        return view('member.income.rank-income')->with($result);
    }
}
