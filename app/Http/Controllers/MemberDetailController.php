<?php

namespace App\Http\Controllers;

use App\Models\DashMessage;
use App\Models\MemberDetail;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\GlobalPoolMatrice;
use Illuminate\Http\Request;
use App\Models\SetRate;
use App\Models\StackingIncome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberDetailController extends Controller
{
    function index()
    {
        if (session()->has('MEMBER_ID')) {
            return redirect('member/dashboard');
        } else {
            return view('member.signin');
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'password' => 'required'
        ]);
        $memberid = $request->post('memberid');
        $password = $request->post('password');

        $result = MemberDetail::where('memberid', $memberid)->first();
        if ($result) {
            $hashed = $result->password;
            if (Hash::check($password, $hashed)) {
                $request->session()->put('MEMBER_LOGIN', true);
                $request->session()->put('MEMBER_ID', $result->memberid);
                return redirect('member/dashboard');
            } else {
                session()->flash('failedmsg', 'Please enter valid Password to login');
                return redirect('/member');
            }
        } else {
            session()->flash('failedmsg', 'Please enter valid Memberid to login');
            return redirect('/member');
        }
    }

    public function register(Request $request, $id)
    {
        $sponsorid['sdata'] = $id;
        $sponsorid['cdata'] = Country::all();
        return view('member.signup')->with($sponsorid);
    }

    public function userregister(Request $request)
    {
        $request->validate([
            'sponsor' => 'required|exists:member_details,memberid',
            'name' => 'required',
            'email' => 'required|email|unique:member_details,email',
            'mobile' => 'required|min:10|max:10',
            'country' => 'required',
            'password' => 'required|min:5|max:50',
            // 'txn_password' => 'required|min:5|max:50',
        ]);
        $sponsorid = strtoupper($request->post('sponsor'));
        $spon = MemberDetail::where('memberid', $sponsorid)->first();
        $email = $request->post('email');
        $country = $request->post('country');

        if ($spon->status != 'Active') {
            session()->flash('failedMsg', 'Your account is not activated.');
            return redirect()->back();
        }
        $check = MemberDetail::where('email', $email)->first();
        if ($check) {
            session()->flash('failedMsg', 'This email is already registered');
            return redirect()->back();
        }
        $var  = new MemberDetail();
        $var->memberid = userId();
        $var->sponsorid = $sponsorid;
        $var->name = $request->post('name');
        $var->email = $email;
        $var->country = $country;
        $var->mobile = $request->post('mobile');
        $password =  $request->post('password');
        $var->password = Hash::make($password);
        $txnpass = 123456; //rand(100000, 999999);
        $var->txn_password = Hash::make($txnpass);
        $var->country = $request->post('country');
        $var->p2p_wallet = 1000;
        $var->save();
        $data = MemberDetail::find($var->id);
        $userid = $data->memberid;
        $email = $data->email;
        $name = $data->name;
        $mobile = $data->mobile;
        if ($email != '') {
            $mailData = [
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'memberid' => $userid,
                'password' => $password,
                'txn_password' => $txnpass
            ];
            $user['to'] = $email;
            // Mail::send('member.mails.mail', $mailData, function ($message) use ($user) {

            //     $message->to($user['to']);
            //     $message->subject('Stable Coin Member Login Credentials');
            // });
        }
        $request->session()->put('name', $request->post('name'));
        $request->session()->put('userid', $userid);
        $request->session()->put('email', $email);
        $request->session()->put('mobile', $mobile);
        $request->session()->put('country', $country);
        $request->session()->put('password', $request->post('password'));
        $request->session()->put('txn_password', $txnpass);
        
        // updateUpline($sponsorid, $userid);
        session()->flash('successMsg', 'Account has been created Successfully!.');
        return redirect('member/account-created');
    }

    public function accountCreated()
    {
        return view('member.account-created');
    }
    
    public function dashboard(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['matrix'] = GlobalPoolMatrice::where('memberid', $memberid)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        $result['dashMsg'] = DashMessage::orderby('rank', 'asc')->get();
        $date = $result['data']['package_activated_at'];
        if ($date != NULL) {
            $result['rest'] = date('Y-m-d H:i:s', strtotime($date . '+24 Hours'));
        } else {
            $result['rest'] = 0;
        }
        return view('member.dashboard')->with($result);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('MEMBER_LOGIN');
        $request->session()->forget('MEMBER_ID');

        return redirect('/member/logout');
    }

    public function getSponname(Request $request)
    {
        $sponsorid = $request->post('sponsorid');
        if ($sponsorid != '') {
            $data = MemberDetail::where('memberid', $sponsorid)->first();
            if ($data) {

                if ($data['status'] == 'Temp') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span style="color:blue">This Sponsor Id is not active</span>'
                    ]);
                } elseif ($data['status'] == 'Deactive') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span class="text-danger">This Sponsor Id is Deactive. Please change sponsor id</span>'
                    ]);
                } elseif ($data['status'] == 'Active') {
                    return response()->json([
                        'code' => 1,
                        'data' => '<span class="text-success">Sponsor Name :' . $data['name'] . '</span>'
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>'
                ]);
            }
        } else {
            return response()->json([
                'code' => 1,
                'data' => ''
            ]);
        }
    }

    public function getMember(Request $request)
    {
        $memberid = $request->post('memberid');
        if ($memberid != '') {
            $data = MemberDetail::where('memberid', $memberid)->first();
            if ($data) {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-success">Member Name :' . $data['name'] . '</span>'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'data' => ''
            ]);
        }
    }

    public function getUserid(Request $request)
    {
        $userid = $request->post('userid');
        if ($userid != '') {
            $data = MemberDetail::where('memberid', $userid)->first();
            if ($data) {
                if ($data['status'] == 'Temp') {
                    return response()->json([
                        'code' => 1,
                        'data' => '<span class="text-success">Member Name - ' . $data['name'] . '. You can activate this Id</span>',
                        'package' => 30,
                        'plan' => 'Bronze'
                    ]);
                } elseif ($data['status'] == 'Active') {
                    $message = '<span class="text-success">Member Name - ' . $data['name'] . '. You can upgrade this Id</span>';
                    $code = 1;
                    if ($data['package'] == 30) {
                        $package = 60;
                        $plan = 'Silver';
                    } elseif ($data['package'] == 60) {
                        $package = 120;
                        $plan = 'Gold';
                    } elseif ($data['package'] == 120) {
                        $package = 240;
                        $plan = 'Platinum';
                    } elseif ($data['package'] == 240) {
                        $package = 480;
                        $plan = 'Titanium';
                    } elseif ($data['package'] == 480) {
                        $package = 960;
                        $plan = 'Diamond';
                    } elseif ($data['package'] == 960) {
                        $package = 0;
                        $plan = 'All Plans Activated';
                        $message = '<span class="text-danger">Member Name - ' . $data['name'] . '. All packages are updated</span>';
                        $code = 0;
                    }
                    return response()->json([
                        'code' => $code,
                        'data' => $message,
                        'package' => $package,
                        'plan' => $plan
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'data' => ''
            ]);
        }
    }

    public function createUser()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['countries'] = Country::all();
        return view('member.create-user')->with($result);
    }

    public function createNewUser(Request $request)
    {
        $request->validate([
            'sponsor' => 'required|exists:member_details,memberid',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10|max:10',
            'password' => 'required',
            'country'=>'required'
        ]);
        $sponsorid = strtoupper($request->post('sponsor'));
        $spon = MemberDetail::where('memberid', $sponsorid)->first();
        $email = $request->post('email');
        $country = $request->post('country');
        if ($spon == NULL) {
            session()->flash('failedMsg', 'Please enter valid sponorid');
            return redirect()->back();
        }
        // if ($spon['status'] != 'Active') {
        //     session()->flash('failedMsg', 'This sponsorid is not activated');
        //     return redirect()->back();
        // }
        $check = MemberDetail::where('email', $email)->first();
        if ($check) {
            session()->flash('failedMsg', 'This email is not available. Please change email');
            return redirect()->back();
        }
        if ($email == 'Root') {
            session()->flash('failedMsg', 'This email can not be used');
            return redirect()->back();
        }

        $var  = new MemberDetail();
        $var->memberid = userId();
        $var->sponsorid = $sponsorid;
        $var->name = $request->post('name');
        $var->email = $email;
        $var->country = $country;
        $var->mobile = $request->post('mobile');
        $password =  $request->post('password');
        $var->password = Hash::make($password);
        $txnpass =  $request->post('txn_password');
        $var->txn_password = Hash::make($txnpass);
        $var->p2p_wallet = 10;
        $var->country = $request->post('country');
        $var->save();
        $data = MemberDetail::find($var->id);
        $userid = $data->memberid;
        $email = $data->email;
        $name = $data->name;
        $mobile = $data->mobile;
        if ($email != '') {
            $mailData = [
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'memberid' => $userid,
                'password' => $password,
                'txn_password' => $txnpass
            ];
            $user['to'] = $email;
            Mail::send('member.mails.mail', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Robo9 Member Login Credentials');
            });
        }
        $request->session()->put('name', $request->post('name'));
        $request->session()->put('userid', $userid);
        $request->session()->put('email', $email);
        $request->session()->put('mobile', $mobile);
        $request->session()->put('country', $country);
        $request->session()->put('password', $request->post('password'));
        $request->session()->put('txn_password', $txnpass);
        
        updateUpline($sponsorid, $userid);
        session()->flash('successMsg', 'Your account has been created successfully. Please login to your account using email and password!.');
        return redirect()->back();
    }

    public function userSummary()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.profile.user-summary')->with($result);
    }

    public function insertPdata(Request $request)
    {
        //print_r($request->post());
        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $status = $var->status;
        if ($status == 'Active') {
            session()->flash('failedMsg', 'You are not allowed to change profile data');
            return redirect()->back();
        }
        $var->name = $request->post('name');
        $var->email = $request->post('email');
        // $var->country_code = $request->post('country_code');
        $var->mobile = $request->post('mobile');
        $var->gender = $request->post('gender');
        $var->dob = $request->post('dob');
        $var->country = $request->post('country');
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->profile_image = $filename;
        }
        if ($request->hasfile('government_id_img')) {
            $file = $request->file('government_id_img');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = 'GID' . time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->government_id_img = $filename;
        }
        $var->save();

        session()->flash('successMsg', 'Profile Details have been updated');
        return redirect()->back();
    }

    public function security()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.profile.security')->with($result);
    }

    public function passChange(Request $request)
    {
        $request->validate([
            'password' => 'required|required_with:password_confirm|same:password_confirm|min:6',
            'password_confirm' => 'required|min:6'
        ]);

        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $var->password = Hash::make($request->post('password'));
        $var->save();

        session()->flash('successMsg_pass', 'Password has been updated successfully');
        return redirect()->back();
    }

    public function txnpassChange(Request $request)
    {
        $request->validate([
            'password' => 'required|required_with:password_confirm|same:password_confirm|min:6',
            'password_confirm' => 'required|min:6'
        ]);

        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $var->txn_password = Hash::make($request->post('password'));
        $var->save();

        session()->flash('successMsg', 'Transaction Password has been updated successfully');
        return redirect()->back();
    }

    public function walletAddress()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        return view('member.profile.wallet-address')->with($result);
    }

    public function sendWalletAddressOtp()
    {
        $memberid = session('MEMBER_ID');
        $result = MemberDetail::where('memberid', $memberid)->first();
        $memberid = $result->memberid;
        $wallet_address = $result->wallet_address;
        $email = $result->email;
        $otp = rand(100000, 999999);
        session()->put('walletaddress_otp', $otp);

        if ($email != '') {
            $mailData = [
                'otp' => $otp,
                'memberid' => $memberid,
            ];
            $user['to'] = $email;
            Mail::send('member.mails.withdrawal-mail', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Robo9 Member Withdrawal OTP');
            });
        }

        session()->flash('successMsg', 'Your OTP has been sent to registered email');
        return redirect()->back();
    }

   public function insertWalletAddress(Request $request)
    {

        $request->validate([
            'walletaddress_otp' => 'required',
            'wallet_address' => 'required',
            // 'txn_password' => 'required'
        ]);

        $id = $request->post('id');
        // $txn_password = $request->post('txn_password');
        $var = MemberDetail::find($id);
        // if (!Hash::check($txn_password, $var->txn_password)) {
        //     session()->flash('failedMsg', 'Enter Transaction password do not match. Please check and try again');
        //     return redirect()->back();
        // }

        $fill_otp = $request->post('walletaddress_otp');
        $session_otp = session()->get('walletaddress_otp');
        if ($fill_otp != $session_otp) {
            session()->flash('failedMsg', 'Entered OTP donot match.Please check and try again');
            return redirect()->back();
        }
        $var->wallet_address = $request->post('wallet_address');
        $var->kyc_status = 'Submitted';
        $var->save();
        session()->forget('walletaddress_otp');

        session()->flash('successMsg', 'Wallet Address have been inserted successfully!');
        return redirect()->back();
    }

    public function memforgetPassword()
    {
        return view('member.forget-password');
    }

    public function memretrivePassword(Request $request)
    {
        $memberid = $request->post('memberid');

        $data = memberDetail::where('memberid', $memberid)->first();
        if ($data) {

            // $name = $data['name'];
            $email = $data['email'];
            $memberid = $data['memberid'];
            $password = rand(100000, 999999);
            $data->password = Hash::make($password);
            $data->save();

            if ($email != '') {
                $mailData = [
                    // 'name' => $name,
                    'email' => $email,
                    'memberid' => $memberid,
                    'password' => $password
                ];
                $user['to'] = $email;
                Mail::send('member.mails.forget-password-mail', $mailData, function ($message) use ($user) {

                    $message->to($user['to']);
                    $message->subject('Robo9 Member Account Password');
                });
            }
            session()->flash('succMsg', 'Your Account Password has been sent to your registered email.');
            return redirect()->back();
        } else {
            session()->flash('forgetPassErr', 'Entered MemberId is not registered with us!');
            return redirect()->back();
        }
    }

    public function gallery(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['gdata'] = Gallery::where('memberid', $memberid)->first();
        return view('member.gallery')->with($result);
    }

    public function galleryUpdate(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
            ]
        ]);
        $memberid = $request->post('memberid');
        $title = $request->post('title');

        $var = Gallery::where('memberid', $memberid)->first();
        if($var){
            $var->memberid = $memberid;
            $var->title = $title;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                    session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                    return redirect()->back();
                }
                $filename = 'GID' . time() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $var->image = $filename;
            }
            $var->save();

            session()->flash('updateErr', 'Your Gallery have been updated');
            return redirect()->back();
        }else{
            $new = new Gallery();
            $new->memberid = $memberid;
            $new->title = $title;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                    session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                    return redirect()->back();
                }
                $filename = 'GID' . time() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $new->image = $filename;
            }
            $new->save();

            session()->flash('updateErr', 'Gallery has been inserted successfully');
            return redirect()->back();
        }
    }


}
