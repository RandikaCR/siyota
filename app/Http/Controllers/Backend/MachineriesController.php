<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Labels;
use App\Models\Machineries;
use App\Models\MachineryCategories;
use App\Models\MachineryImages;
use App\Models\MachineryLabels;
use Illuminate\Http\Request;

class MachineriesController extends Controller
{
    public function index(Request $request){

        $keyword = !empty($request->keyword) ? $request->keyword : null;
        $status = isset($request->status) ? $request->status : 'all';

        $machineries = Machineries::select(
            'machineries.*',
            'machinery_images.image AS primary_image',
        )
            ->leftJoin('machinery_images', 'machineries.id', 'machinery_images.machinery_id')
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('machineries.machinery', 'like', "%$keyword%")
                    ->orWhere('machineries.description', 'like', "%$keyword%");
            })
            ->orderBy('machineries.id', 'DESC')
            ->groupBy('machineries.id')
            ->paginate(20)
            ->withQueryString();


        return view('backend.machineries.index', [
            'machineries' => $machineries,
            'keyword' => $keyword,
        ]);

    }

    public function create(Request $request){

        $tempId = $this->getTempMachineryId($request);
        $categories = MachineryCategories::where('status', 1)->orderBy('display_order', 'ASC')->get();
        $images = MachineryImages::where('machinery_id', $tempId)->get();

        return view('backend.machineries.create',[
            'temp_id' => $tempId,
            'categories' => $categories,
            'images' => $images,
        ]);
    }

    public function edit(Request $request, $uuId){
        $this->clearTempMachineryId($request);

        $machinery = Machineries::where('uuid', $uuId)->first();
        $tempId = $machinery->id;
        $categories = MachineryCategories::where('status', 1)->orderBy('display_order', 'ASC')->get();
        $images = MachineryImages::where('machinery_id', $tempId)->get();
        $labels = Labels::where('status', 1)->get();

        $machineryLabels = MachineryLabels::where('machinery_id', $tempId)->get();

        return view('backend.machineries.create',[
            'temp_id' => $tempId,
            'machinery' => $machinery,
            'categories' => $categories,
            'images' => $images,
            'labels' => $labels,
            'machinery_labels' => $machineryLabels,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'slug' => 'required',
            'machinery_category_id' => 'required',
            'machinery' => 'required',
        ]);


        if(!empty($request->id)){
            $save = Machineries::find($request->id);

            $msg = 'Machinery has been Updated Successfully!';
        }
        else{

            $req = ['screen' => 'machineries', 'id' => ''];
            $uuId = $this->generateUUId($req);

            $save = new Machineries();
            $save->uuid = $uuId;
            $save->status = 1;

            $msg = 'Machinery has been Created Successfully!';
        }

        $save->slug = !empty($request->slug) ? $request->slug : null;
        $save->machinery_category_id = !empty($request->machinery_category_id) ? $request->machinery_category_id : 0;
        $save->machinery = !empty($request->machinery) ? $request->machinery : null;
        $save->description = !empty($request->description) ? $request->description : null;
        $save->display_order = !empty($request->display_order) ? $request->display_order : 0;
        $save->save();

        $machineryId = $save->id;

        // Labels
        $availableLabelIds = [];
        if (!empty($request->label_ids)) {
            foreach ($request->label_ids as $labelId) {
                $availableLabelIds[] = $labelId;

                $getLabel = MachineryLabels::where('machinery_id', $machineryId)
                    ->where('label_id', $labelId)
                    ->first();
                if (empty($getLabel)) {
                    $p = new MachineryLabels();
                    $p->machinery_id = $machineryId;
                    $p->label_id = $labelId;
                    $p->status = 1;
                    $p->save();
                }
            }
        }

        // Delete Labels
        $getAllLabels = MachineryLabels::where('machinery_id', $machineryId)->get();
        foreach($getAllLabels as $pl){
            if (!in_array($pl->label_id, $availableLabelIds)) {
                $p = MachineryLabels::find($pl->id);
                $p->delete();
            }
        }


        if (!empty(session('temp_machinery_id'))){
            $sessionId = session('temp_machinery_id');
            $this->clearTempMachineryId($request);
            $images = MachineryImages::where('machinery_id', $sessionId)->get();

            $primaryImageId = 0;
            foreach ($images as $img){

                if (!empty($img->is_primary)){
                    $primaryImageId = $img->id;
                }

                $image = MachineryImages::find($img->id);
                $image->machinery_id = $save->id;
                $image->save();
            }

            //Set Primary Image if not has been set
            if (empty($primaryImageId)){
                $image = MachineryImages::where('machinery_id', $sessionId)->first();
                $image->is_primary = 1;
                $image->save();
            }
        }

        session()->flash('success', $msg);
        return redirect( route('backend.machineries.index') );

    }

    public function delete(Request $request){

        $news = Machineries::find($request->id);
        $news->delete();

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
        ]);
    }

    public function getTempMachineryId(Request $request){
        $rand = rand(10000000,99999999) . time();
        $tempId = !empty(session('temp_machinery_id')) ? session('temp_machinery_id') : null;
        if (empty($tempId)){
            $request->session()->put('temp_machinery_id', $rand);
            $request->session()->save();

            $tempId = $rand;
        }

        return $tempId;
    }

    public function clearTempMachineryId(Request $request){

        $tempId = !empty(session('temp_machinery_id')) ? session('temp_machinery_id') : null;
        if (!empty($tempId)){
            $request->session()->forget('temp_machinery_id');
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
                $img = new MachineryImages();
                $img->machinery_id = $request->id;
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

        $getCount = Machineries::where('slug', $slug)->count();
        if ($getCount > 0){
            $item = Machineries::where('id', $id)->first();
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

        $img = MachineryImages::find($request->id);
        $img->delete();

        return response()->json([
            'status' => 'success',
            'id' =>  $request->id,
        ]);
    }

    public function setPrimaryImage(Request $request){

        $img = MachineryImages::find($request->id);

        $images = MachineryImages::where('machinery_id', $img->machinery_id)->get();
        if (!empty($images)){
            foreach ($images as $image){
                $i = MachineryImages::find($image->id);
                $i->is_primary = 0;
                $i->save();
            }
        }

        $img->is_primary = 1;
        $img->save();

        $images = [];
        $getImages = MachineryImages::where('machinery_id', $img->machinery_id)->get();
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
            $get = Machineries::find($id);

            if ($get->status == 1){
                $get->status = 0;
            }else {
                $get->status = 1;
            }
            $get->save();
            $status = 'success';
            $get = Machineries::find($id);
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

        $labels = Labels::where('status', 1)->get();

        return response()->json([
            'status' =>  $status,
            'labels' =>  $labels,
        ]);
    }

}
