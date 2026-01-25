<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.index');
    }

    public function aboutUs(Request $request)
    {
        return view('frontend.about-us');
    }

    public function contactUs(Request $request)
    {
        return view('frontend.contact-us');
    }

    public function services(Request $request)
    {
        return view('frontend.services');
    }

    public function gallery(Request $request)
    {
        return view('frontend.gallery');
    }


    public function appLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $out = ['status' => 'success'];
        return response()->json($out);
    }


}
