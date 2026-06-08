<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Labels;
use App\Models\Machineries;
use App\Models\MachineryCategories;
use App\Models\MachineryHires;
use Illuminate\Http\Request;

class MachineriesController extends Controller
{
    public function index(Request $request, $slug = null){
        $title = 'All Machineries Hire';
        $categoryId = 0;
        $keyword = !empty($request->keyword) ? $request->keyword : null;

        if (!empty($slug)){
            $pc = MachineryCategories::where('slug', $slug)->where('status', 1)->first();
            if (empty($pc)){
                return redirect()->route('frontend.machineries.index');
            }

            $categoryId = $pc->id;
            $title = $pc->machinery_category;
        }

        $machineries = Machineries::select(
            'machineries.*',
            'machinery_images.image AS primary_image',
        )
            ->join('machinery_categories', 'machineries.machinery_category_id', 'machinery_categories.id')
            ->leftJoin('machinery_images', 'machineries.id', 'machinery_images.machinery_id')
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('machineries.machinery', 'like', "%$keyword%")
                    ->orWhere('machineries.description', 'like', "%$keyword%");
            })
            ->when(!empty($categoryId), function ($query) use ($categoryId) {
                return $query->where('machineries.machinery_category_id', $categoryId);
            })
            ->orderBy('machineries.display_order', 'ASC')
            ->orderBy('machinery_categories.display_order', 'ASC')
            ->orderBy('machineries.id', 'DESC')
            ->groupBy('machineries.id')
            ->paginate(18)
            ->withQueryString();

        $machineryHire = MachineryHires::find(1);

        return view('frontend.machineries.index', [
            'title' => $title,
            'machineries' => $machineries,
            'machinery_hire' => $machineryHire,
        ]);
    }

    public function view(Request $request, $slug = null){

        $keyword = !empty($request->keyword) ? $request->keyword : null;


        $machinery = Machineries::select(
            'machineries.*',
            'machinery_images.image AS primary_image',
        )
            ->leftJoin('machinery_images', 'machineries.id', 'machinery_images.machinery_id')
            ->with([
                'images' => function ($query) {
                    return $query->select('machinery_images.*')
                        ->orderBy('machinery_images.is_primary', 'DESC');
                },
                'machinery_labels' => function ($query) {
                    return $query->select('machinery_labels.*', 'labels.name')
                        ->join('labels', 'machinery_labels.label_id', 'labels.id');
                },
            ])
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('machineries.machinery', 'like', "%$keyword%")
                    ->orWhere('machineries.description', 'like', "%$keyword%");
            })
            ->where('machineries.slug', $slug)
            ->first();

        if (empty($machinery)){
            return redirect()->route('frontend.machineries.index');
        }

        $releated = Machineries::select(
            'machineries.*',
            'machinery_images.image AS primary_image',
        )
            ->leftJoin('machinery_images', 'machineries.id', 'machinery_images.machinery_id')
            ->where('machineries.id', '!=', $machinery->id)
            ->orderBy('machineries.id', 'DESC')
            ->groupBy('machineries.id')
            ->take(6)
            ->get();

        return view('frontend.machineries.view', [
            'machinery' => $machinery,
            'related_machineries' => $releated,
        ]);
    }

    public function getPricingDetails(Request $request){

        $productId = !empty($request->product_id) ? $request->product_id : 0;
        $thicknessId = !empty($request->thickness_id) ? $request->thickness_id : 0;
        $labelId = !empty($request->label_id) ? $request->label_id : 0;

        $getPrice = ProductPrices::where('product_id', $productId)
            ->where('thickness_id', $thicknessId)
            ->where('label_id', $labelId)
            ->first();

        $status = 'success';
        $message = '';
        if (empty($getPrice)){
            $status = 'error';
            $price = 0;
            $message = 'No price available for this product selection';
        }else{
            $price = $getPrice->price;
        }

        $price = priceWithCurrency($price);

        return response()->json([
            'status' => $status,
            'price' => $price,
            'message' => $message,
        ]);
    }
}
