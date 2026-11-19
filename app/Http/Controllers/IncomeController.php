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
        $result['rewData'] = RewardIncome::where('memberid', $result['data']['memberid'])->orderby('amount', 'ASC')->get();
        return view('member.reward.reward-income')->with($result);
    }

    public function rewardDetails()
    {
        $result['data'] = MemberDetail::where('memberid', session('MEMBER_ID'))->first();
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
