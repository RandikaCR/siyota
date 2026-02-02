<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landscapes;


class LandscapesController extends Controller
{
    public function index(Request $request){

        $products = [];

        $keyword = !empty($request->keyword) ? $request->keyword : null;
        $status = isset($request->status) ? $request->status : 'all';

        $products = Landscapes::select(
            'landscapes.*',
        )
            ->orderBy('landscapes.id', 'ASC')
            ->paginate(20)
            ->withQueryString();


        return view('backend.landscapes.index', [
            'products' => $products,
            'keyword' => $keyword,
        ]);

    }

    public function create(Request $request){

        return view('backend.landscapes.create');
    }


    public function store(Request $request){

        $request->validate([
            'image' => 'required',
        ]);


        if(!empty($request->id)){
            $save = Landscapes::find($request->id);

            $msg = 'Landscape has been Updated Successfully!';
        }
        else{

            $req = ['screen' => 'landscapes', 'id' => ''];
            $uuId = $this->generateUUId($req);

            $save = new Landscapes();
            $save->uuid = $uuId;
            $save->status = 1;

            $msg = 'Landscape has been Created Successfully!';
        }

        $save->image = !empty($request->image) ? $request->image : 0;
        $save->save();

        session()->flash('success', $msg);
        return redirect( route('backend.landscapes.index') );

    }


    public function delete(Request $request){

        $news = Landscapes::find($request->id);
        $news->delete();

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
        ]);
    }

    public function imageUpload(Request $request){

        $status = 'error';
        $file_name = '';

        if($request->ajax()){

            $img = $this->commonImageUpload($request, 'uploads');
            $file_name = $img['file_name'];
            $status = $img['status'];

            return response()->json([
                'status' =>  $status,
                'filename' =>  $file_name,
            ]);

        }
    }

    public function status(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;

        $text = '';
        $class = '';

        if (!empty($id)){
            $get = Landscapes::find($id);

            if ($get->status == 1){
                $get->status = 0;
            }else {
                $get->status = 1;
            }
            $get->save();
            $status = 'success';
            $get = Landscapes::find($id);
            $getStatus = $this->categoryStatus($get->status);
            $text = $getStatus->text;
            $class = $getStatus->class;

        }else{
            $status = 'error';
        }


        $out = [
            'status' => $status,
            'text' => $text,
            'class' => $class,
        ];
        return response()->json($out);

    }
}
