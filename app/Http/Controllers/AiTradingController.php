<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use Illuminate\Http\Request;

class AiTradingController extends Controller
{
    public function index(){
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $status = $result['data']['status'];
        if ($status == 'Active') {
            return view('member.ai-trading')->with($result);
        } else {
            return redirect()->to('/member/dashboard');
        }
    }
}
