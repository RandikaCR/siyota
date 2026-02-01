<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $req = ['screen' => 'user_roles', 'id' => ''];
        $refId = $this->generateUUId($req);

        /*$u = new UserRoles();
        $u->ref_id = $refId;
        $u->user_role = 'User';
        $u->display_name = 'User';
        $u->status = 1;
        $u->save();*/

        $qrRegisterdUsers = 12500;

        $vipRegisterdUsers = 12000;

        $normalRegisterdUsers = 10000;

        return view('backend.index', [
            'qrRegisterdUsers' => $qrRegisterdUsers,
            'vipRegisterdUsers' => $vipRegisterdUsers,
            'normalRegisterdUsers' => $normalRegisterdUsers,
        ]);
    }
}
