<?php

namespace App\Http\Controllers;

use App\Models\GlobalPoolMatrice;
use App\Models\MemberDetail;
use App\Models\PackageDetail;
use App\Models\ProfitDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StakingController extends Controller
{
    public static function getSlotDefinition(): array
    {
        return [
            1  => ['slot' => 1,  'amount' => 5,     'name' => 'Slot 1',  'price' => '$5'],
            2  => ['slot' => 2,  'amount' => 15,    'name' => 'Slot 2',  'price' => '$15'],
            3  => ['slot' => 3,  'amount' => 50,    'name' => 'Slot 3',  'price' => '$50'],
            4  => ['slot' => 4,  'amount' => 100,   'name' => 'Slot 4',  'price' => '$100'],
            5  => ['slot' => 5,  'amount' => 300,   'name' => 'Slot 5',  'price' => '$300'],
            6  => ['slot' => 6,  'amount' => 500,   'name' => 'Slot 6',  'price' => '$500'],
            7  => ['slot' => 7,  'amount' => 1000,  'name' => 'Slot 7',  'price' => '$1,000'],
            8  => ['slot' => 8,  'amount' => 3000,  'name' => 'Slot 8',  'price' => '$3,000'],
            9  => ['slot' => 9,  'amount' => 5000,  'name' => 'Slot 9',  'price' => '$5,000'],
            10 => ['slot' => 10, 'amount' => 10000, 'name' => 'Slot 10', 'price' => '$10,000'],
        ];
    }

    public function investSlot()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $slotDefinitions = self::getSlotDefinition();

        // Get all accepted packages purchased by this member
        $purchasedPackages = PackageDetail::where('memberid', $memberid)
            ->where('status', 'Accepted')
            ->pluck('package')
            ->map(function ($val) {
                return (int) $val;
            })
            ->toArray();

        // Sequential one-by-one unlock logic:
        // Find the lowest slot number not yet purchased
        $nextSlotNumber = null;
        foreach ($slotDefinitions as $slotNum => $info) {
            if (!in_array($info['amount'], $purchasedPackages)) {
                $nextSlotNumber = $slotNum;
                break;
            }
        }

        $slotList = [];
        $activatedCount = 0;
        foreach ($slotDefinitions as $slotNum => $info) {
            $isPurchased = in_array($info['amount'], $purchasedPackages);
            $isNext = ($slotNum === $nextSlotNumber);
            $isLocked = ($nextSlotNumber !== null && $slotNum > $nextSlotNumber) || ($nextSlotNumber === null && !$isPurchased);

            if ($isPurchased) {
                $activatedCount++;
            }

            $slotList[$slotNum] = array_merge($info, [
                'is_purchased' => $isPurchased,
                'is_next' => $isNext,
                'is_locked' => $isLocked,
                'status_label' => $isPurchased ? 'Activated' : ($isNext ? 'Available' : 'Locked'),
            ]);
        }

        $result['slots'] = $slotList;
        $result['nextSlotNumber'] = $nextSlotNumber;
        $result['nextSlot'] = $nextSlotNumber ? $slotList[$nextSlotNumber] : null;
        $result['activatedCount'] = $activatedCount;
        $result['totalSlots'] = count($slotDefinitions);
        $result['allSlotsCompleted'] = ($nextSlotNumber === null);

        return view('member.investment.investment-create', $result);
    }
      
    public function createStaking(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|numeric',
            'txn_password' => 'required'
        ]);

        $memberid = session('MEMBER_ID');
        $amount = (int) $request->post('amount');
        $txn_password = $request->post('txn_password');

        $memUpdate = MemberDetail::where('memberid', $memberid)->first();
        if (!$memUpdate) {
            session()->flash('failedMsg', 'Member not found.');
            return redirect()->back();
        }

        $sponsorid = $memUpdate->sponsorid;
        $p2p_wallet = (float) $memUpdate->p2p_wallet;
        $name = $memUpdate->name;

        $slotDefinitions = self::getSlotDefinition();

        // Get all accepted packages purchased by this member
        $purchasedPackages = PackageDetail::where('memberid', $memberid)
            ->where('status', 'Accepted')
            ->pluck('package')
            ->map(function ($val) {
                return (int) $val;
            })
            ->toArray();

        // Sequential one-by-one unlock check
        $nextSlotNumber = null;
        foreach ($slotDefinitions as $slotNum => $info) {
            if (!in_array($info['amount'], $purchasedPackages)) {
                $nextSlotNumber = $slotNum;
                break;
            }
        }

        if ($nextSlotNumber === null) {
            session()->flash('failedMsg', 'All 10 investment slots have already been activated.');
            return redirect()->back();
        }

        $expectedSlot = $slotDefinitions[$nextSlotNumber];
        if ($amount !== $expectedSlot['amount']) {
            session()->flash('failedMsg', 'Slots must be activated one by one in sequence. Next slot to activate is ' . $expectedSlot['name'] . ' (' . $expectedSlot['price'] . ').');
            return redirect()->back();
        }

        if ($p2p_wallet < $amount) {
            session()->flash('failedMsg', 'Insufficient balance in Fund Wallet. Required: ' . $expectedSlot['price'] . ', Available: $' . number_format($p2p_wallet, 2));
            return redirect()->back();
        }

        if (!Hash::check($txn_password, $memUpdate->txn_password)) {
            session()->flash('failedMsg', 'Entered transaction password does not match.');
            return redirect()->back();
        }

        $var = new PackageDetail();
        $var->txn_date = date('Y-m-d H:i:s');
        $var->order_id = "OD" . time();
        $var->memberid = $memberid;
        $var->package = $amount;
        $var->txnid = time();
        $var->payment_mode = 'P2p Wallet';
        $var->status = 'Accepted';
        $var->save();

        if ($memUpdate->status == 'Temp') {
            $memUpdate->status = 'Active';
            $memUpdate->activated_at = date('Y-m-d H:i:s');
            updateDownline($sponsorid);
            updateUpline($sponsorid, $memberid);
        }
        $memUpdate->package = $amount;
        $memUpdate->investment += $amount;
        $memUpdate->team_biz += $amount;
        $memUpdate->p2p_wallet -= $amount;
        $memUpdate->package_activated_at = date('Y-m-d H:i:s');
        $memUpdate->save();

        walletTransfer($memberid, $amount, 'credit', $p2p_wallet, $expectedSlot['name'] . ' Investment', $expectedSlot['name'] . ' (' . $expectedSlot['price'] . ') activated from Fund Wallet');

        if ($amount == 5) {
            SlotOneAutopool($memberid);
            AutopoolLevelIncome($memberid, 1, $amount);
            
        } elseif ($amount == 15) {
            SlotTwoAutopool($memberid);
            AutopoolLevelIncome($memberid, 2, $amount);
            
        } elseif ($amount == 50) {
            SlotThreeAutopool($memberid);
            AutopoolLevelIncome($memberid, 3, $amount);
            
        } elseif ($amount == 100) {
            SlotFourAutopool($memberid);
            AutopoolLevelIncome($memberid, 4, $amount);
            
        } elseif ($amount == 300) {
            SlotFiveAutopool($memberid);
            AutopoolLevelIncome($memberid, 5, $amount);
            
        } elseif ($amount == 500) {
            SlotSixAutopool($memberid);
            AutopoolLevelIncome($memberid, 6, $amount);
            
        } elseif ($amount == 1000) {
            SlotSevenAutopool($memberid);
            AutopoolLevelIncome($memberid, 7, $amount);
            
        } elseif ($amount == 3000) {
            SlotEightAutopool($memberid);
            AutopoolLevelIncome($memberid, 8, $amount);
            
        } elseif ($amount == 5000) {
            SlotNineAutopool($memberid);
            AutopoolLevelIncome($memberid, 9, $amount);
            
        } elseif ($amount == 10000) {
            SlotTenAutopool($memberid);
            AutopoolLevelIncome($memberid, 10, $amount);
            
        }
        directIncome($sponsorid, $memberid, $name, $amount, "Slot Investment");
        levelIncome($sponsorid, $memberid, $name, $amount);
        team_biz_update($sponsorid, $amount);

        session()->flash('successMsg', $expectedSlot['name'] . ' (' . $expectedSlot['price'] . ') has been activated successfully!');
        return redirect()->back();
    }

    public function investmentDetails()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $memberid = $result['data']['memberid'];
        $result['sdata'] = PackageDetail::where('memberid', $memberid)->orderby('created_at', 'desc')->get();
        return view('member.investment.investment-details')->with($result);
    }

    public function tradeDetails()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $result['sdata'] = GlobalPoolMatrice::where('memberid', $memberid)->orderby('created_at', 'asc')->get();
        return view('member.trade.trade-details')->with($result);
    }

    public function detailedIncome($tid)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $result['sdata'] = ProfitDetail::where('pool_id', $tid)->get();
        return view('member.trade.income-details')->with($result);
    }

}
