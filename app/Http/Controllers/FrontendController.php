<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function gallery()
    {
        $var['data'] = Gallery::where('status', 'Live')->get();
        return view('frontend.gallery')->with($var);
    }

}
