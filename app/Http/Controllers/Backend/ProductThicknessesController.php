<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Thicknesses;
use Illuminate\Http\Request;

class ProductThicknessesController extends Controller
{
    public function index()
    {
        $categories = Thicknesses::orderBy('id', 'ASC')->get();
        return view('backend.thicknesses.index',[
            'categories' => $categories
        ]);
    }


    public function get(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;


        if (!empty($id)){
            $get = Thicknesses::find($id);
            $status = 'success';

        }else{
            $status = 'error';
        }


        $out = [
            'status' => $status,
            'id' => $id,
            'name' => $get->name,
        ];
        return response()->json($out);

    }

    public function store(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;

        /*$validator = $request->validate([
            'news_category' => ['required', 'string', 'unique:product_gender_categories'],
        ]);*/

        $validator = 1;

        if ($validator){

            if (!empty($id)){
                $save = Thicknesses::find($id);
            }
            else{
                $save = New Thicknesses();
                $save->status = 1;
            }

            $save->name = $req['name'];
            $save->save();
            $status = 'success';
            $messageTitle = 'Success';
            $messageText = 'Thickness saved';
        }else{

            $status = 'error';
            $messageTitle = 'Error!';
            $messageText = 'Thickness already exist!';
        }



        $out = [
            'status' => $status,
            'message_title' => $messageTitle,
            'message_text' => $messageText,
        ];
        return response()->json($out);

        /*if ($response->successful()) {
            $rdata = $response->json();
            if (!empty($rdata)) {
                return response()->json($rdata);
            }
        } else if ($response->status() == 400) {
            return response()->json($response->json(), 422);
        } else if ($response->status() == 401) {
            return response()->json($response->json(), 401);
        }*/
    }

    public function status(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;

        $text = '';
        $class = '';

        if (!empty($id)){
            $get = Thicknesses::find($id);

            if ($get->status == 1){
                $get->status = 0;
            }else {
                $get->status = 1;
            }
            $get->save();
            $status = 'success';
            $get = Thicknesses::find($id);
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

    public function slugGenerator(Request $request){

        $status = 'success';
        $isExist = 0;
        $id = $request->id;
        $slug = $this->generateSeoURL($request->title, 1);

        $getCount = Thicknesses::where('slug', $slug)->count();
        if ($getCount > 0){
            $item = Thicknesses::where('id', $id)->first();
            if (!empty($item)){
                if ($item->slug != $slug){
                    $isExist = 1;
                }
            }else{
                $isExist = 1;
            }
        }

        return response()->json([
            'status' =>  $status,
            'is_exist' =>  $isExist,
            'slug' =>  $slug,
        ]);
    }
}
