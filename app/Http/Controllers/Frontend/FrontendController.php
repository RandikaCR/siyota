<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Landscapes;

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

    public function landscapes(Request $request)
    {
        $landscapes = Landscapes::select(
            'landscapes.*',
        )
            ->where('landscapes.status', 1)
            ->get();

        return view('frontend.landscapes', [
            'landscapes' => $landscapes
        ]);
    }


    public function appLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $out = ['status' => 'success'];
        return response()->json($out);
    }

    public function sendMessage(Request $request)
    {

        $body = '<!DOCTYPE html><html lang="en"><head><title>New Inquiry Received</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;display=swap" rel="stylesheet"><style type="text/css">body{text-align:center;margin:0 auto;width:650px;font-family:"Open Sans",sans-serif;background-color:#e2e2e2;display:block}ul{margin:0;padding:0}li{display:inline-block;text-decoration:unset}a{text-decoration:none}p{margin:15px 0}h5{color:#444;text-align:left;font-weight:400}.text-center{text-align:center}.main-bg-light{background-color:#fafafa}.title{color:#444;font-size:22px;font-weight:700;margin-top:10px;margin-bottom:10px;padding-bottom:0;text-transform:uppercase;display:inline-block;line-height:1}table{margin-top:60px}table.top-0{margin-top:0}table.order-detail{border:1px solid #ddd;border-collapse:collapse}table.order-detail tr:nth-child(even){border-top:1px solid #ddd;border-bottom:1px solid #ddd}table.order-detail tr:nth-child(odd){border-bottom:1px solid #ddd}.pad-left-right-space{border:unset!important}.pad-left-right-space td{padding:5px 15px}.pad-left-right-space td p{margin:0}.pad-left-right-space td b{font-size:15px;font-family:Roboto,sans-serif}.order-detail th{font-size:16px;padding:15px;text-align:center;background:#fafafa}.footer-social-icon tr td img{margin-left:5px;margin-right:5px}</style></head><body style="margin: 20px auto;background: #cccccc; padding-top: 20px;" bgcolor="#cccccc"><table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #ffffff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 600px;" width="600"><tbody><tr><td><table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;" width="100%"><tr><td style="text-align: center;" colspan="3"><img src="'.asset("assets/common/images/logo.png").'" alt="logo" style=";margin-bottom: 30px;" width="200px;"></td></tr><tr><td colspan="3"><p style="font-size: 14px;">You have received a new inquiry from siyota.lk</p></td></tr><tr><td colspan="3"><p style="font-size: 14px;">Inquiry ID : <b>'.$request->subject.'</b></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;">Name : <b>'.$request->name.'</b></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;">Phone : <b>'.$request->phone.'</b></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;">Email : <b>'.$request->email.'</b></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;">Message : <b>'.$request->message.'</b></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;"></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;"></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;"></p></td></tr><tr><td colspan="3"><p style="font-size: 14px;"></p></td></tr></table></td></tr></tbody></table></body></html>';

        $data = [
            'subject' => 'New Inquiry from Siyota Website',
            'to_mail' => 'work.cralwis@gmail.com',
            'to_name' => 'Siyota Official Website',
            'body' => $body,
        ];
        $send = $this->sendMail($data);

        return response()->json(['status' => 'success']);
    }


}
