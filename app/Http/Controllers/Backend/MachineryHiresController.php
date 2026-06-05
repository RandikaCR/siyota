<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MachineryHires;
use Illuminate\Http\Request;

class MachineryHiresController extends Controller
{
    public function index(Request $request){
        $machinery = MachineryHires::find(1);
        return view('backend.machinery-hires.index', ['machinery' => $machinery]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'body_content' => 'required',
        ]);

        $save = MachineryHires::find(1);
        $save->title = $request->title;
        $save->content = $request->body_content;
        $save->save();

        session()->flash('success', 'Machinery Hires content has been updated Successfully');
        return redirect( route('backend.machineryHires.index') );

    }
}
