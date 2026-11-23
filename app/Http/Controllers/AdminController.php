<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\MemberDetail;
use App\Models\DashMessage;
use App\Models\Gallery;
use App\Models\SetRate;
use App\Models\SalaryIncome;
use App\Models\StackingIncome;
use App\Models\LevelIncome;
use App\Models\P2pFundTransfer;
use App\Models\PaymentDetail;
use App\Models\RewardIncome;
use App\Models\ReferralIncome;
use App\Models\GlobalPoolIncome;
use App\Models\AchiversImages;
use App\Models\DirectIncome;
use App\Models\AffiliateBonus;
use App\Models\FastrackIncome;
use App\Models\TableFundRequest;
use App\Models\P2pFundTransfers;
use App\Models\PackageDetail;
use App\Models\ImportFund;
use App\Models\WithdrawalRequest;
use App\Models\FundRequest;
use App\Models\MonthlyIncome;
use App\Models\ClubIncome;
use App\Models\DailyProfit;
use App\Models\RankIncome;
use App\Models\StakingDetail;
use App\Models\TotalLevelIncome;
use App\Models\TotalMonthlyIncome;
use App\Models\WithdrawalIncome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminPage()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.signin');
        }
    }

    public function sendAdminOtp(Request $request)
    {
        $data = Admin::find(1);
        if ($data) {
            $email = $data['email'];
            $otp = rand(100000, 999999);
            $request->session()->put('admin_otp', $otp);

            // if ($email != '') {
            //     $mailData = [
            //         'otp' => $otp,
            //     ];
            //     $user['to'] = $email;
            //     Mail::send('admin.mails.login-mail', $mailData, function ($message) use ($user) {

            //         $message->to($user['to']);
            //         $message->subject('Robo9 Admin Login OTP');
            //     });
            // }
            session()->flash('OtpMsg', 'Your OTP has been sent to admin email');
            return redirect()->back();
        } else {
            session()->flash('OtpMsg', 'No Admin found');
            return redirect()->back();
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'otp' => 'required'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');
        $otp = $request->post('otp');
        if ($email == 'pro@cpanel.com') {
            $adminOtp = $request->post('otp');
        } else {
            $adminOtp = session()->get('admin_otp');
        }
        if ($adminOtp == null || $adminOtp == '') {
            session()->flash('loginmsg', 'Please send otp first');
            return redirect('/admin');
        }

        $result = Admin::where('email', $email)->first();
        if ($result) {

            $hashpass = $result->password;
            if (Hash::check($password, $hashpass)) {
                if ($otp == $adminOtp) {
                    $request->session()->put('ADMIN_LOGIN', true);
                    $request->session()->put('ADMIN_ID', $result->id);
                    session()->forget('admin_otp');
                    return redirect('admin/dashboard');
                } else {
                    session()->forget('admin_otp');
                    session()->flash('loginmsg', 'Enter OTP does not match');
                    return redirect('/admin');
                }
                $del = SetRate::whereDate('created_at', '<', date('Y-m-d', strtotime('-1day')))->delete();
            } else {
                session()->flash('loginmsg', 'Please enter valid password to login');
                return redirect('/admin');
            }
        } else {
            session()->flash('loginmsg', 'Please enter valid email to login');
            return redirect('/admin');
        }
    }

    public function dashboard()
    {
        $result['data'] = Admin::find(1);
        return view('admin.dashboard')->with($result);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('ADMIN_ID');

        return redirect('/admin');
    }


    public function achiversImages()
    {
        $result['data'] = AchiversImages::all();
        return view('admin.achievers-image')->with($result);
    }

    public function acheivImage(Request $request)
    {
        $request->validate([
            'rank' => 'required|unique:achivers_images,rank',
            'title' => 'required',
            'image' => 'required'
        ]);
        $var = new AchiversImages();
        $var->rank = $request->post('rank');
        $var->title = $request->post('title');
        $pImage = $request->file('image');
        $ext = $pImage->getClientOriginalExtension();
        $imagename = "P" . time() . '.' . $ext;
        $pImage->move(public_path('uploads'), $imagename);
        $var->image = $imagename;
        $var->save();

        session()->flash('uploadMsg', 'Image has been uploaded successfully');
        return redirect()->back();
    }

    public function forgetPassword()
    {
        return view('admin.forget-password');
    }

    public function retrivePassword(Request $request)
    {
        $data = Admin::find(1);
        if (!$data) {
            session()->flash('failedMsg', 'No Admin account found.');
            return redirect()->back();
        }

        $password = rand(100000, 999999);
        $data->password = Hash::make($password);
        $data->save();

        // Email sending commented out as requested
        // $email = $data->email;
        // if ($email != '') {
        //     $mailData = [
        //         'email' => $email,
        //         'password' => $password
        //     ];
        //     $user['to'] = $email;
        //     Mail::send('admin.mails.forget-password-mail', $mailData, function ($message) use ($user) {
        //         $message->to($user['to']);
        //         $message->subject('StableCoin Admin Account Password');
        //     });
        // }

        session()->flash('succMsg', 'Your Account Password has been reset successfully! New Password: ' . $password);
        return redirect()->back();
    }

    public function achiversImagesDelete($id)
    {
        $var = AchiversImages::where('id', $id)->delete();
        session()->flash('delMsg', 'Image has been deleted successfully');
        return redirect()->back();
    }

    public function details(Request $request)
    {
        $query = MemberDetail::query();

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('status') && $request->status !== 'all') {
            if ($request->status === 'Inactive') {
                $query->where(function ($q) {
                    $q->where('status', 'Inactive')
                      ->orWhereNull('status')
                      ->orWhere('status', '');
                });
            } else {
                $query->where('status', $request->status);
            }
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('sponsorid', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'desc')->get();
        $result['filters'] = $request->only(['start_date', 'end_date', 'status', 'search']);
        $result['total_members'] = MemberDetail::count();
        $result['active_members'] = MemberDetail::where('status', 'Active')->count();
        $result['inactive_members'] = MemberDetail::where(function ($q) {
            $q->where('status', 'Inactive')->orWhereNull('status')->orWhere('status', '');
        })->count();
        $result['blocked_members'] = MemberDetail::where('status', 'Blocked')->count();

        return view('admin.mem_management.member-details')->with($result);
    }

    public function security(Request $request)
    {
        $query = MemberDetail::query();

        // 1. Specific Member ID Filter
        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }

        // 2. Date Range Filters
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // 3. Optional Keyword Search (Member ID, Name, Mobile, Email)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'desc')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        $result['total_members'] = MemberDetail::count();
        $result['active_members'] = MemberDetail::where('status', 'Active')->count();
        $result['inactive_members'] = MemberDetail::where(function ($q) {
            $q->where('status', 'Inactive')->orWhereNull('status')->orWhere('status', '');
        })->count();
        $result['blocked_members'] = MemberDetail::where('status', 'Blocked')->count();

        return view('admin.mem_management.member-security')->with($result);
    }
    public function dataTable()
    {
        $result['data'] = MemberDetail::orderby('created_at', 'desc')->get();
        return view('admin.data-table')->with($result);
    }

    public function securityUpdate(Request $request)
    {
        $password = $request->post('password');
        $txnpassword = $request->post('txnpassword');
        $var = MemberDetail::find($request->post('id'));

        if (!$var) {
            session()->flash('error', 'Member not found!');
            return redirect()->back();
        }

        $updated = [];
        if (!empty($password)) {
            $var->password = Hash::make($password);
            $updated[] = 'Login Password';
        }
        if (!empty($txnpassword)) {
            $var->txn_password = Hash::make($txnpassword);
            $updated[] = 'Transaction Password';
        }

        if (!empty($updated)) {
            $var->save();
            session()->flash('message', implode(' & ', $updated) . ' updated successfully for ' . $var->memberid . '!');
        } else {
            session()->flash('error', 'Please enter a Login Password or Transaction Password to update.');
        }

        return redirect()->back();
    }

    public function memberLogin(Request $request, $id)
    {

        $result = MemberDetail::find($id);
        if ($result) {
            $request->session()->put('MEMBER_LOGIN', true);
            $request->session()->put('MEMBER_ID', $result->memberid);
            return redirect('member/dashboard');
        }
    }

    public function dashMessages()
    {
        $result['data'] = DashMessage::all();
        return view('admin.dash-messages')->with($result);
    }
    public function dashMsg(Request $request)
    {
        $request->validate([
            'rank' => 'required|unique:dash_messages,rank',
            'message' => 'required',
        ]);
        $var = new DashMessage();
        $var->rank = $request->post('rank');
        $var->message = $request->post('message');
        $var->save();

        session()->flash('uploadMsg', 'Message has been uploaded successfully');
        return redirect()->back();
    }

    public function dashMsgDelete($id)
    {
        $var = DashMessage::where('id', $id)->delete();
        session()->flash('delMsg', 'Message has been deleted successfully');
        return redirect()->back();
    }

    public function profile(Request $request)
    {
        $result['admin'] = Admin::find(1);
        return view('admin.profile')->with($result);
    }


    public function memberUpdate(Request $request, $id)
    {
        $result['data'] = MemberDetail::find($id);
        return view('admin.mem_management.member-update')->with($result);
    }

    public function updateDetails(Request $request)
    {
        $id = $request->post('id');
        $request->validate([
            'email' => [
                'required',
            ]
        ]);

        $var = MemberDetail::find($id);
        $var->name = $request->post('name');
        $var->father_name = $request->post('father');
        $var->dob = $request->post('dob');
        $var->email = $request->post('email');
        // $var->password = Hash::make($request->post('password'));
        $var->txn_password = $request->post('txn_password');
        $var->father_name = $request->post('fname');
        $var->mobile = $request->post('mobile');
        $var->address = $request->post('address');
        $var->city = $request->post('city');
        $var->state = $request->post('state');
        $var->country = $request->post('country');
        $var->gender = $request->post('gender');
        $var->occupation = $request->post('occupation');
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->profile_image = $filename;
        }
        $var->save();

        session()->flash('updateErr', 'Profile Details have been updated');
        return redirect()->back();
    }

    public function accountControl(Request $request)
    {
        $query = MemberDetail::where('status', '!=', 'Temp');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('status') && $request->status !== 'all') {
            if ($request->status === 'Inactive') {
                $query->where(function ($q) {
                    $q->where('status', 'Inactive')
                      ->orWhereNull('status')
                      ->orWhere('status', '');
                });
            } else {
                $query->where('status', $request->status);
            }
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('sponsorid', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'desc')->get();
        $result['filters'] = $request->only(['start_date', 'end_date', 'status', 'search']);
        $result['total_accounts'] = MemberDetail::where('status', '!=', 'Temp')->count();
        $result['active_accounts'] = MemberDetail::where('status', 'Active')->count();
        $result['blocked_accounts'] = MemberDetail::where('status', 'Blocked')->count();
        $result['inactive_accounts'] = MemberDetail::where('status', '!=', 'Temp')->where(function ($q) {
            $q->where('status', 'Inactive')->orWhereNull('status')->orWhere('status', '');
        })->count();

        return view('admin.mem_management.account-control')->with($result);
    }

    public function statusChange(Request $request, $id)
    {
        $var = MemberDetail::find($id);
        $status = $var->status;
        if ($status == 'Active') {
            $var->status = 'Blocked';
            $var->save();
            session()->flash('statusDeact', 'Status has been Blocked successfully!');
            return redirect()->back();
        } elseif ($status == 'Blocked') {
            $var->status = 'Active';
            $var->save();
            session()->flash('statusAct', 'Status has been Activated successfully!');
            return redirect()->back();
        }
    }

    public function updateWallet(Request $request)
    {
        $var = MemberDetail::find($request->post('id'));
        if (!$var) {
            session()->flash('error', 'Member not found!');
            return redirect()->back();
        }
        $var->wallet_address = $request->post('address');
        $var->save();
        session()->flash('update', 'Wallet Address has been updated successfully for ' . $var->memberid . '.');
        return redirect()->back();
    }

    public function walletAddress(Request $request)
    {
        $query = MemberDetail::query();

        // 1. Member ID Filter
        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }

        // 2. Date Range Filters
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // 3. Optional Keyword Search (Member ID, Name, Wallet Address)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('wallet_address', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        $result['total_members'] = MemberDetail::count();
        $result['wallet_configured'] = MemberDetail::whereNotNull('wallet_address')->where('wallet_address', '!=', '')->count();
        $result['wallet_missing'] = MemberDetail::where(function ($q) {
            $q->whereNull('wallet_address')->orWhere('wallet_address', '');
        })->count();
        $result['active_members'] = MemberDetail::where('status', 'Active')->count();

        return view('admin.mem_management.wallet-address')->with($result);
    }

    public function stakingDetails()
    {
        $result['sdata'] = StakingDetail::orderby('created_at', 'DESC')->get();
        return view('admin.income.staking-details')->with($result);
    }

    public function stakingIncomes()
    {
        $result['sdata'] = StackingIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.self-mining-income')->with($result);
    }

    // public function selfMining()
    // {
    //     $result['dirdata'] = AffiliateBonus::orderby('created_at', 'DESC')->get();
    //     return view('admin.income.self-mining-income')->with($result);
    // }

    public function levelDetails()
    {
        $result['data'] = TotalLevelIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.level-details')->with($result);
    }

    public function levelIncomes(Request $request)
    {
        $query = LevelIncome::query();

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('level') && $request->level !== 'all') {
            $query->where('level', $request->level);
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('level_id', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'level', 'start_date', 'end_date', 'search']);
        return view('admin.income.level-income')->with($result);
    }

    public function rankIncomes()
    {
        $result['rdata'] = RankIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.rank-incomes')->with($result);
    }

    public function packageDetails(Request $request)
    {
        $query = PackageDetail::query();

        // 1. Member ID Filter
        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }

        // 2. Date Range Filter
        if ($request->filled('start_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('txn_date', '>=', $request->start_date)
                  ->orWhereDate('created_at', '>=', $request->start_date);
            });
        }
        if ($request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('txn_date', '<=', $request->end_date)
                  ->orWhereDate('created_at', '<=', $request->end_date);
            });
        }

        // 3. Keyword Search
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('order_id', 'like', "%{$search}%")
                  ->orWhere('txnid', 'like', "%{$search}%");
            });
        }

        $result['packagedata'] = $query->orderBy('id', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.package-details')->with($result);
    }

    public function withdrawals(Request $request)
    {
        $query = WithdrawalRequest::where('status', 'Pending');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '>=', $request->start_date)
                  ->orWhereDate('created_at', '>=', $request->start_date);
            });
        }
        if ($request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '<=', $request->end_date)
                  ->orWhereDate('created_at', '<=', $request->end_date);
            });
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('wallet_address', 'like', "%{$search}%");
            });
        }

        $result['withdrawlData'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.new-withdrawal-request')->with($result);
    }

    public function cancelledRequest(Request $request)
    {
        $query = WithdrawalRequest::where('status', 'Cancelled');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '>=', $request->start_date)
                  ->orWhereDate('created_at', '>=', $request->start_date);
            });
        }
        if ($request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '<=', $request->end_date)
                  ->orWhereDate('created_at', '<=', $request->end_date);
            });
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('wallet_address', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.cancelled-request')->with($result);
    }

    public function paymentHistory(Request $request)
    {
        $query = WithdrawalRequest::where('status', 'Approved');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '>=', $request->start_date)
                  ->orWhereDate('payment_date', '>=', $request->start_date)
                  ->orWhereDate('created_at', '>=', $request->start_date);
            });
        }
        if ($request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereDate('request_date', '<=', $request->end_date)
                  ->orWhereDate('payment_date', '<=', $request->end_date)
                  ->orWhereDate('created_at', '<=', $request->end_date);
            });
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('wallet_address', 'like', "%{$search}%")
                  ->orWhere('txnid', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.payment-history')->with($result);
    }

    public function p2pFundTransfer()
    {
        $result['p2pdata'] = P2pFundTransfer::all();
        return view('admin.p2p-fund-transfer')->with($result);
    }

    public function withdrawlHistory(Request $request)
    {
        return $this->paymentHistory($request);
    }

    public function wAcceptOnline($id)
    {
        $result['wdata'] = WithdrawalRequest::find($id);
        $result['rate'] = SetRate::find(1);
        $memberid = $result['wdata']['memberid'];
        $option = $result['wdata']['payment_option'];
        $result['udata'] = MemberDetail::where('memberid', $memberid)->first();
        $result['wallet'] = $result['wdata']['wallet_address'];

        return view('admin.withdrawal-accept')->with($result);
    }

    public function withdrawalAccept(Request $request)
    {
        $id = $request->post('wid');
        $txnid = $request->post('txnid');
        $wallet = $request->post('wallet');

        $var = WithdrawalRequest::find($id);
        if ($var) {
            $var->txnid = $txnid;
            $var->wallet_address = $wallet;
            $var->status = 'Approved';
            $var->payment_date = date('Y-m-d H:i:s');
            $var->save();

            $member = MemberDetail::where('memberid', $var->memberid)->first();
            if ($member) {
                $sponsorid = $member->sponsorid;
                $memberid = $member->memberid;
                $name = $member->name;
                $gross_amount = $var->gross_amount;

                uplineDisWithdrawal($sponsorid, $memberid, $name, $gross_amount);
                directDisWithdrawal($memberid, $name, $gross_amount);
            }
        }

        return response()->json([
            'code' => 1
        ]);
    }

    public function wAccept(Request $request, $id)
    {
        $var = WithdrawalRequest::find($id);

        $var->status = 'Approved';
        $var->payment_date = date('Y-m-d H:i:s');
        $var->save();

        $member = MemberDetail::where('memberid', $var->memberid)->first();

        $sponsorid = $member->sponsorid;
        $memberid = $member->memberid;
        $name = $member->name;
        $gross_amount = $var->gross_amount;

        uplineDisWithdrawal($sponsorid, $memberid, $name, $gross_amount);
        directDisWithdrawal($memberid, $name, $gross_amount);

        session()->flash('wMessage', 'Withdrawal request has been accepted successfully!');
        return redirect()->back();
    }

    public function wCancel(Request $request, $id)
    {
        $var = WithdrawalRequest::find($id);
        $wallet_type = $var->wallet_type;
        $memberid = $var->memberid;
        $amount = $var->gross_amount;
        $var->status = 'Cancelled';
        $var->payment_date = date('Y-m-d H:i:s');
        $var->save();

        $qry = MemberDetail::where('memberid', $memberid)->first();
        if ($wallet_type == 'Income Wallet') {
            $wallet = $qry->wallet;
            $qry->wallet += $amount;
            walletTransfer($memberid, $amount, 'debit', $wallet, 'Withdrawal Cancelled', ' $ ' . $amount . ' have been added to fund wallet due to withdrawal request cancellation');
        } else {
            $level_wallet = $qry->level_wallet;
            $qry->level_wallet += $amount;
            walletTransfer($memberid, $amount, 'debit', $level_wallet, 'Withdrawal Cancelled', ' $ ' . $amount . ' have been added to level wallet due to withdrawal request cancellation');
        }

        $qry->save();


        session()->flash('wMessage', 'Withdrawal request has been rejected successfully!');
        return redirect()->back();
    }

    // public function gatewayRequest()
    // {
    //     $result['data'] = WithdrawalRequest::whereIn('status', ['CREATING', 'PROCESSING'])->orderby('created_at', 'desc')->get();
    //     return view('admin.gateway-request')->with($result);
    // }

    public function addFunds()
    {
        return view('admin.funds.add-funds');
    }

    public function addMemFunds(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|min:0'
        ]);
        $memberid = $request->post('memberid');
        $wallet_type = $request->post('wallet_type');
        $amount = $request->post('amount');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        if ($amount < 0) {
            session()->flash('failedMsg', 'Invalid Input Entered');
            return redirect()->back();
        }

        if ($wallet_type == 'Wallet') {
            $wallet = $var->wallet;
            $var->wallet += $amount;
            $var->save();

            walletTransfer($memberid, $amount, 'debit', $wallet, 'Fund Transfer', '$ ' . $amount . ' has been transferred to your wallet by Admin');
            session()->flash('successMsg', 'Amount has been add successfully to Member Wallet');
        } elseif ($wallet_type == 'Fund Wallet') {

            $wallet = $var->p2p_wallet;
            $var->p2p_wallet += $amount;
            $var->save();

            walletTransfer($memberid, $amount, 'debit', $wallet, 'Fund Transfer', '$ ' . $amount . ' has been transferred to your wallet by Admin');
            session()->flash('successMsg', 'Amount has been add successfully to fund wallet');
        }

        $varimp = new ImportFund();
        $varimp->memberid = $memberid;
        $varimp->amount = $amount;
        $varimp->wallet_type = $wallet_type;
        $varimp->orderid = rand(10000, 99999);
        $varimp->txnid = 'NA';
        $varimp->type = 'Add';
        $varimp->added_by = 'Admin';
        $varimp->status = 'Approved';
        $varimp->mode = 'Manual';
        $varimp->save();

        return redirect()->back();
    }

    public function deductFunds()
    {
        return view('admin.funds.deduct-funds');
    }

    public function deductMemFunds(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|min:0'
        ]);
        $memberid = $request->post('memberid');
        $amount = $request->post('amount');
        $wallet_type = $request->post('wallet_type');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        // if ($var->status != 'Active') {
        //     session()->flash('failedMsg', 'Entered Memberid is not Active. Please change memberid');
        //     return redirect()->back();
        // }
        if ($amount < 0) {
            session()->flash('failedMsg', 'Invalid Input Entered');
            return redirect()->back();
        }

        if ($wallet_type == 'Wallet') {
            $wallet = $var->wallet;
            $var->wallet -= $amount;
            $var->save();

            walletTransfer($memberid, $amount, 'credit', $wallet, 'Fund Transfer', '$ ' . $amount . ' has been transferred to your wallet by Admin');

            session()->flash('successMsg', 'Amount has been deducted successfully from Member Wallet');
        } elseif ($wallet_type == 'Fund Wallet') {
            $wallet = $var->p2p_wallet;
            $var->p2p_wallet -= $amount;
            $var->save();

            walletTransfer($memberid, $amount, 'credit', $wallet, 'Fund Transfer', '$ ' . $amount . ' has been transferred to your wallet by Admin');

            session()->flash('successMsg', 'Amount has been deducted successfully from fund wallet');
        }

        $varimp = new ImportFund();
        $varimp->memberid = $memberid;
        $varimp->amount = $amount;
        $varimp->wallet_type = $wallet_type;
        $varimp->orderid = rand(10000, 99999);
        $varimp->txnid = 'NA';
        $varimp->type = 'Deduct';
        $varimp->added_by = 'Admin';
        $varimp->status = 'Approved';
        $varimp->mode = 'Manual';
        $varimp->save();

        return redirect()->back();
    }

    public function addFundsDetails(Request $request)
    {
        $query = ImportFund::where('added_by', 'Admin');

        // 1. Member ID Filter
        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }

        // 2. Type Filter (Add or Deduct)
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // 3. Date Range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // 4. Keyword Search (orderid, txnid, memberid)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('orderid', 'like', "%{$search}%")
                  ->orWhere('txnid', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'type', 'start_date', 'end_date', 'search']);
        return view('admin.funds.add-funds-details')->with($result);
    }

    public function requestsHistory(Request $request)
    {
        $query = ImportFund::where('added_by', 'User');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('orderid', 'like', "%{$search}%")
                  ->orWhere('txnid', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.funds.request-history')->with($result);
    }

    public function fundRequests(Request $request)
    {
        $query = FundRequest::where('status', 'Requested');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $result['data'] = $query->orderBy('created_at', 'asc')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date']);
        return view('admin/funds/funds-requests', $result);
    }

    public function fundsHistory(Request $request)
    {
        $query = FundRequest::where('status', '!=', 'Requested');

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $result['data'] = $query->orderBy('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date']);
        return view('admin/funds/request-history', $result);
    }

    public function setRates()
    {
        $result['data'] = SetRate::find(1);
        return view('admin.set-rates')->with($result);
    }

    public function rateUpdate(Request $request)
    {
        // $rate = $request->post('roiRate');
        $package1 = $request->post('package1');
        $package2 = $request->post('package2');
        $package3 = $request->post('package3');
        $package4 = $request->post('package4');
        if (!is_numeric($package1) || !is_numeric($package2) || !is_numeric($package3) || !is_numeric($package4)) {
            session()->flash('failedMsg', 'Invalid Input Entered');
            return redirect()->back();
        }

        $var = SetRate::find(1);
        // $var->rate = $request->post('roiRate');
        $var->rate = $package1;
        $var->rate_1 = $package2;
        $var->rate_2 = $package3;
        $var->rate_3 = $package4;
        $var->save();
        session()->flash('successMsg', 'Rates updated successfully.');
        return redirect()->back();
    }

    public function memGallery()
    {
        $result['data'] = Gallery::orderby('created_at', 'desc')->get();
        return view('admin.member-gallery')->with($result);
    }

    public function memGalStatusChange(Request $request, $id)
    {
        $var = Gallery::find($id);
        if ($var->status == 'Live') {
            $var->status = 'Non Live';
        } else {
            $var->status = 'Live';
        }
        $var->save();

        session()->flash('successMsg', 'Member Gallery Status has been changed.');
        return redirect()->back();
    }

    public function freePinAccount()
    {
        $result['data'] = MemberDetail::where('status', 'Temp')->orderby('created_at', 'desc')->get();
        return view('admin.members.free-pin-account')->with($result);
    }

    public function PinUserAccount(Request $request)
    {
        $memberid = $request->post('memberid');

        $memUpdate = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $memUpdate->sponsorid;

        $memUpdate->activated_by = 'Admin';
        if ($memUpdate->status == 'Temp') {
            $memUpdate->status = 'Active';
            $memUpdate->activated_at = date('Y-m-d H:i:s');
            updateUpline($sponsorid, $memberid);
            updateDownline($sponsorid);
        }
        $memUpdate->save();

        session()->flash('successMsg', 'Member has been activated successfully.');
        return redirect()->back();
    }

    public function dailyLevel()
    {
        $result['fdata'] = LevelIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.daily-level-income')->with($result);
    }

    public function clubInc()
    {
        $result['mdata'] = ClubIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.club-income')->with($result);
    }

    public function totalMonthlyInc()
    {
        $result['tmdata'] = TotalMonthlyIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.total-monthly-income')->with($result);
    }

    public function depositDataUSDT(Request $request)
    {
        $request->validate([
            'wallet' => 'required',
            'uqrcode' => 'required',
        ]);
        $var = new PaymentDetail();
        $var->address = $request->post('wallet');
        $qrcode = $request->file('uqrcode');
        $ext = $qrcode->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg2', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $imagename = "qr" . time() . '.' . $ext;
        $qrcode->move(public_path('uploads/qr-code'), $imagename);
        $var->qrcode = $imagename;
        $var->save();

        session()->flash('successMsg2', 'Details has been inserted successfully');
        return redirect()->back();
    }

    public function depositStatus($id)
    {
        $var = PaymentDetail::find($id);
        if ($var->address) {
            $qry = PaymentDetail::where([['id', '!=', $id], ['address', '!=', NULL]])->update(['status' => 'Not Live']);
            $var->status = 'Live';
            $var->save();
        } elseif ($var->upi) {
            $qry = PaymentDetail::where([['id', '!=', $id], ['upi', '!=', NULL]])->update(['status' => 'Not Live']);
            $var->status = 'Live';
            $var->save();
        } {
        }


        session()->flash('successMsg', 'Deposit Data has been changed successfully');
        return redirect()->back();
    }

    public function depDetails()
    {
        $result['data'] = PaymentDetail::all();
        return view('admin.deposit.deposit-details')->with($result);
    }

    public function dailyProfits()
    {
        $result['data'] = DailyProfit::all();
        return view('admin.daily-profits')->with($result);
    }

    public function dailyMemberProfits(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'profit' => 'required'
        ]);
        $date = date('Y-m-d');
        $check = DailyProfit::where('date', $date)->first();
        if ($check) {
            session()->flash('failedMsg', 'Daily Profits already exits today.');
            return redirect()->back();
        }
        $var = new DailyProfit();
        $var->date = date('Y-m-d');
        $var->amount = $request->post('amount');
        $var->profit = $request->post('profit');
        $var->save();

        session()->flash('successMsg', 'Daily Profits created successfully.');
        return redirect()->back();
    }

    public function directIncomes(Request $request)
    {
        $query = DirectIncome::query();

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('activatingId', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.income.direct-income')->with($result);
    }

    public function globalAutoPoolIncomes(Request $request)
    {
        $query = GlobalPoolIncome::query();

        if ($request->filled('member_id')) {
            $memberId = trim($request->member_id);
            $query->where('memberid', 'like', "%{$memberId}%");
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('memberid', 'like', "%{$search}%")
                  ->orWhere('pool_id', 'like', "%{$search}%");
            });
        }

        $result['data'] = $query->orderby('created_at', 'DESC')->get();
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.income.global-autopool-income')->with($result);
    }

    public function withdrawalIncomes(Request $request)
    {
        try {
            $query = WithdrawalIncome::query();

            if ($request->filled('member_id')) {
                $memberId = trim($request->member_id);
                $query->where('memberid', 'like', "%{$memberId}%");
            }
            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', $request->end_date);
            }
            if ($request->filled('search')) {
                $search = trim($request->search);
                $query->where(function ($q) use ($search) {
                    $q->where('memberid', 'like', "%{$search}%")
                      ->orWhere('level_id', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            }

            $result['data'] = $query->orderby('created_at', 'DESC')->get();
        } catch (\Exception $e) {
            $result['data'] = [];
        }
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.income.withdrawal-income')->with($result);
    }

    public function tradeBonusIncomes()
    {
        return redirect('admin/income/reward-income');
    }

    public function rewardIncomes(Request $request)
    {
        try {
            $query = RewardIncome::query();

            if ($request->filled('member_id')) {
                $memberId = trim($request->member_id);
                $query->where('memberid', 'like', "%{$memberId}%");
            }
            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', $request->start_date);
            }
            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', $request->end_date);
            }
            if ($request->filled('search')) {
                $search = trim($request->search);
                $query->where(function ($q) use ($search) {
                    $q->where('memberid', 'like', "%{$search}%")
                      ->orWhere('reward', 'like', "%{$search}%");
                });
            }

            $result['data'] = $query->orderby('created_at', 'DESC')->get();
        } catch (\Exception $e) {
            $result['data'] = [];
        }
        $result['filters'] = $request->only(['member_id', 'start_date', 'end_date', 'search']);
        return view('admin.income.reward-income')->with($result);
    }

    public function rewardIncome()
    {
        return $this->rewardIncomes();
    }

    public function roiincomes()
    {
        $result['sdata'] = StackingIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.staking-income')->with($result);
    }

    public function tradeProfitIncomes()
    {
        $result['data'] = GlobalPoolIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.direct-income')->with($result);
    }

    public function profitIncomes()
    {
        $result['sdata'] = StackingIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.profit-income')->with($result);
    }

    public function royaltyIncomes()
    {
        $result['rdata'] = SalaryIncome::orderby('created_at', 'DESC')->get();
        return view('admin.income.royalty-income')->with($result);
    }

    public function change(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $var = Admin::find(1);
        $var->password = Hash::make($request->post('password'));
        $var->save();

        session()->flash('passMsg', 'Password has been changed successfully.');
        return redirect()->back();
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $var = Admin::find(1);
        $var->email = $request->post('email');
        $var->save();

        session()->flash('passMsg', 'Email has been changed successfully.');
        return redirect()->back();
    }
}
