<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $categories = ProductCategories::orderBy('id', 'ASC')->get();
        return view('backend.product_category.index',[
            'categories' => $categories
        ]);
    }


    public function get(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;


        if (!empty($id)){
            $get = ProductCategories::find($id);
            $status = 'success';

        }else{
            $status = 'error';
        }


        $out = [
            'status' => $status,
            'id' => $id,
            'product_category' => $get->product_category,
            'display_order' => $get->display_order,
            'slug' => $get->slug,
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
                $save = ProductCategories::find($id);
            }
            else{

                $treq = ['screen' => 'product_categories', 'id' => ''];
                $uuId = $this->generateUUId($treq);

                $save = New ProductCategories();
                $save->uuid = $uuId;
                $save->status = 1;
            }

            $save->slug = $req['slug'];
            $save->product_category = $req['product_category'];
            $save->display_order = !empty($req['display_order']) ? $req['display_order'] : 0;
            $save->save();
            $status = 'success';
            $messageTitle = 'Success';
            $messageText = 'Product Category saved';
        }else{

            $status = 'error';
            $messageTitle = 'Error!';
            $messageText = 'Product Category already exist!';
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
            $get = ProductCategories::find($id);

            if ($get->status == 1){
                $get->status = 0;
            }else {
                $get->status = 1;
            }
            $get->save();
            $status = 'success';
            $get = ProductCategories::find($id);
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

        $getCount = ProductCategories::where('slug', $slug)->count();
        if ($getCount > 0){
            $item = ProductCategories::where('id', $id)->first();
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
