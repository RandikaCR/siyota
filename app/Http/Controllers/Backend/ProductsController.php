<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Labels;
use App\Models\ProductCategories;
use App\Models\ProductImages;
use App\Models\ProductPrices;
use App\Models\Products;
use App\Models\Thicknesses;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request){

        $products = [];

        $keyword = !empty($request->keyword) ? $request->keyword : null;
        $status = isset($request->status) ? $request->status : 'all';

        $products = Products::select(
            'products.*',
            'product_images.image AS primary_image',
        )
            ->leftJoin('product_images', 'products.id', 'product_images.product_id')
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('products.product', 'like', "%$keyword%")
                    ->orWhere('products.description', 'like', "%$keyword%");
            })
            //->where('news_images.is_primary', 1)
            ->orderBy('products.id', 'DESC')
            ->groupBy('products.id')
            ->paginate(20)
            ->withQueryString();


        return view('backend.products.index', [
            'products' => $products,
            'keyword' => $keyword,
        ]);

    }

    public function create(Request $request){

        $tempId = $this->getTempProductId($request);
        $categories = ProductCategories::where('status', 1)->orderBy('display_order', 'ASC')->get();
        $images = ProductImages::where('product_id', $tempId)->get();

        return view('backend.products.create',[
            'temp_id' => $tempId,
            'categories' => $categories,
            'images' => $images,
        ]);
    }

    public function edit(Request $request, $uuId){
        $this->clearTempProductId($request);

        $product = Products::where('uuid', $uuId)->first();
        $tempId = $product->id;
        $categories = ProductCategories::where('status', 1)->orderBy('display_order', 'ASC')->get();
        $images = ProductImages::where('product_id', $tempId)->get();
        $thicknesses = Thicknesses::where('status', 1)->get();
        $labels = Labels::where('status', 1)->get();
        $productPrices = ProductPrices::where('product_id', $tempId)->get();

        return view('backend.products.create',[
            'temp_id' => $tempId,
            'product' => $product,
            'categories' => $categories,
            'images' => $images,
            'thicknesses' => $thicknesses,
            'labels' => $labels,
            'product_prices' => $productPrices,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'slug' => 'required',
            'product_category_id' => 'required',
            'product' => 'required',
        ]);


        if(!empty($request->id)){
            $save = Products::find($request->id);

            $msg = 'Product has been Updated Successfully!';
        }
        else{

            $req = ['screen' => 'products', 'id' => ''];
            $uuId = $this->generateUUId($req);

            $save = new Products();
            $save->uuid = $uuId;
            $save->status = 1;

            $msg = 'Product has been Created Successfully!';
        }

        $save->slug = !empty($request->slug) ? $request->slug : null;
        $save->product_category_id = !empty($request->product_category_id) ? $request->product_category_id : 0;
        $save->product = !empty($request->product) ? $request->product : null;
        $save->description = !empty($request->description) ? $request->description : null;
        $save->save();

        $productId = $save->id;

        //Insert/Update Prices
        $priceCount = 0;
        $availablePriceIds = [];
        foreach($request->price as $price){
            if (!empty($priceCount)){
                $thicknessId = $request->product_thickness_id[$priceCount];
                $labelId = $request->product_label_id[$priceCount];
            }else{
                $thicknessId = 0;
                $labelId = 0;
            }

            $getDefaultPrice = ProductPrices::where('product_id', $productId)
                ->where('thickness_id', $thicknessId)
                ->where('label_id', $labelId)
                ->first();

            if (empty($getDefaultPrice)) {
                $p = new ProductPrices();
                $p->product_id = $productId;
                $p->thickness_id = $thicknessId;
                $p->label_id = $labelId;
                $p->price = $price;
                $p->status = 1;
                $p->save();
                $availablePriceIds[] = $p->id;
            }else{
                $getDefaultPrice->price = $price;
                $getDefaultPrice->save();
                $availablePriceIds[] = $getDefaultPrice->id;
            }

            $priceCount++;
        }

        //Delete Other Prices
        $getDefaultPrices = ProductPrices::where('product_id', $productId)->get();
        foreach($getDefaultPrices as $price){
            if (!in_array($price->id, $availablePriceIds)) {
                $p = ProductPrices::find($price->id);
                $p->delete();
            }
        }


        if (!empty(session('temp_product_id'))){
            $sessionId = session('temp_product_id');
            $this->clearTempProductId($request);
            $images = ProductImages::where('product_id', $sessionId)->get();

            $primaryImageId = 0;
            foreach ($images as $img){

                if (!empty($img->is_primary)){
                    $primaryImageId = $img->id;
                }

                $image = ProductImages::find($img->id);
                $image->product_id = $save->id;
                $image->save();
            }

            //Set Primary Image if not has been set
            if (empty($primaryImageId)){
                $image = ProductImages::where('product_id', $sessionId)->first();
                $image->is_primary = 1;
                $image->save();
            }
        }

        session()->flash('success', $msg);
        return redirect( route('backend.products.index') );

    }


    public function delete(Request $request){

        $news = Products::find($request->id);
        $news->delete();

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
        ]);
    }


    public function getTempProductId(Request $request){
        $rand = rand(10000000,99999999) . time();
        $tempId = !empty(session('temp_product_id')) ? session('temp_product_id') : null;
        if (empty($tempId)){
            $request->session()->put('temp_product_id', $rand);
            $request->session()->save();

            $tempId = $rand;
        }

        return $tempId;
    }

    public function clearTempProductId(Request $request){

        $tempId = !empty(session('temp_product_id')) ? session('temp_product_id') : null;
        if (!empty($tempId)){
            $request->session()->forget('temp_product_id');
            $request->session()->save();
        }

        return true;
    }

    public function imageUpload(Request $request){

        $status = 'error';
        $file_name = '';

        if($request->ajax()){

            $img = $this->commonImageUpload($request, 'uploads', 1);
            $file_name = $img['file_name'];
            $status = $img['status'];
            $isPrimary = 0;

            $imgId = 0;
            if (!empty($file_name)){
                $img = new ProductImages();
                $img->product_id = $request->id;
                $img->image = $file_name;
                $img->is_primary = 0;
                $img->status = 1;
                $img->save();

                $imgId = $img->id;
                $isPrimary = $img->is_primary;
            }

            return response()->json([
                'status' =>  $status,
                'filename' =>  $file_name,
                'id' =>  $imgId,
                'is_primary' =>  $isPrimary,
            ]);

        }
    }



    public function slugGenerator(Request $request){

        $status = 'success';
        $isExist = 0;
        $id = $request->id;
        $slug = $this->generateSeoURL($request->title);

        $getCount = Products::where('slug', $slug)->count();
        if ($getCount > 0){
            $item = Products::where('id', $id)->first();
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


    public function deleteImage(Request $request){

        $img = ProductImages::find($request->id);
        $img->delete();

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
        ]);
    }

    public function setPrimaryImage(Request $request){

        $img = ProductImages::find($request->id);

        $images = ProductImages::where('product_id', $img->product_id)->get();
        if (!empty($images)){
            foreach ($images as $image){
                $i = ProductImages::find($image->id);
                $i->is_primary = 0;
                $i->save();
            }
        }

        $img->is_primary = 1;
        $img->save();

        $images = [];
        $getImages = ProductImages::where('product_id', $img->product_id)->get();
        foreach ($getImages as $image){

            $isPrimary = !empty($image->is_primary) ? 1 : 0;

            $images[] = [
                'filename' =>  $image->image,
                'id' =>  $image->id,
                'is_primary' =>  $isPrimary,
            ];
        }

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
            'images' =>  $images,
        ]);
    }

    public function status(Request $request){
        $req = $request->all();
        $id = !empty($req['id']) ? $req['id'] : 0;

        $text = '';
        $class = '';

        if (!empty($id)){
            $get = Products::find($id);

            if ($get->status == 1){
                $get->status = 0;
            }else {
                $get->status = 1;
            }
            $get->save();
            $status = 'success';
            $get = Products::find($id);
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

    public function getDetailsForPriceRow(Request $request){

        $status = 'success';

        $thicknesses = Thicknesses::where('status', 1)->get();
        $labels = Labels::where('status', 1)->get();

        return response()->json([
            'status' =>  $status,
            'thicknesses' =>  $thicknesses,
            'labels' =>  $labels,
        ]);
    }
}
