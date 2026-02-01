<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\ProductPrices;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request, $slug = null){
        $title = 'All Products';
        $categoryId = 0;
        $keyword = !empty($request->keyword) ? $request->keyword : null;

        if (!empty($slug)){
            $pc = ProductCategories::where('slug', $slug)->where('status', 1)->first();
            if (empty($pc)){
                return redirect()->route('frontend.products.index');
            }

            $categoryId = $pc->id;
            $title = $pc->product_category;
        }

        $products = Products::select(
            'products.*',
            'product_images.image AS primary_image',
            'product_prices.price AS default_price',
        )
            ->leftJoin('product_images', 'products.id', 'product_images.product_id')
            ->leftJoin('product_prices', 'products.id', 'product_prices.product_id')
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('products.product', 'like', "%$keyword%")
                    ->orWhere('products.description', 'like', "%$keyword%");
            })
            ->when(!empty($categoryId), function ($query) use ($categoryId) {
                return $query->where('products.product_category_id', $categoryId);
            })
            ->where('product_prices.thickness_id', 0)
            ->where('product_prices.label_id', 0)
            ->orderBy('products.id', 'DESC')
            ->groupBy('products.id')
            ->paginate(18)
            ->withQueryString();

        return view('frontend.products.index', [
            'title' => $title,
            'products' => $products,
        ]);
    }

    public function view(Request $request, $slug = null){

        $keyword = !empty($request->keyword) ? $request->keyword : null;


        $product = Products::select(
            'products.*',
            'product_images.image AS primary_image',
            'product_prices.price AS default_price',
        )
            ->leftJoin('product_images', 'products.id', 'product_images.product_id')
            ->leftJoin('product_prices', 'products.id', 'product_prices.product_id')
            ->with([
                'images' => function ($query) {
                    return $query->select('product_images.*')
                        ->orderBy('product_images.is_primary', 'DESC');
                }
            ])
            ->when(!empty($keyword), function ($query) use ($keyword) {
                return $query->where('products.product', 'like', "%$keyword%")
                    ->orWhere('products.description', 'like', "%$keyword%");
            })
            ->where('products.slug', $slug)
            ->where('product_prices.thickness_id', 0)
            ->where('product_prices.label_id', 0)
            ->first();

        if (empty($product)){
            return redirect()->route('frontend.products.index');
        }

        $releated = Products::select(
            'products.*',
            'product_images.image AS primary_image',
            'product_prices.price AS default_price',
        )
            ->leftJoin('product_images', 'products.id', 'product_images.product_id')
            ->leftJoin('product_prices', 'products.id', 'product_prices.product_id')
            ->where('products.id', '!=', $product->id)
            ->where('product_prices.thickness_id', 0)
            ->where('product_prices.label_id', 0)
            ->orderBy('products.id', 'DESC')
            ->groupBy('products.id')
            ->take(6)
            ->get();

        $product_prices = ProductPrices::select(
            'product_prices.*',
            'thicknesses.name AS thickness_name',
            'labels.name AS label_name',
        )
            ->join('thicknesses', 'product_prices.thickness_id', 'thicknesses.id')
            ->join('labels', 'product_prices.label_id', 'labels.id')
            ->where('product_prices.product_id', $product->id)
            ->get();

        return view('frontend.products.view', [
            'product' => $product,
            'related_products' => $releated,
            'product_prices' => $product_prices,
        ]);
    }
}
