<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index($slug, $categoryId){
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $products = Product::where('category_id', $categoryId)->paginate(1);
        return view('site.shop.products.category.product-categories.list', compact('categoriesLimit', 'products'));
    }
    public function list(Request $request, $slug){
        $category = ProductCategory::where('slug', $slug)->first();
        if (!is_object($category)) {
            abort(404);
        }

        $brands = Brand::all();
        $sizes = Size::all();
        $categories = ProductCategory::all();
        $products = Product::all();

        $paginateProducts = Product::where('category_id', $category->id);
        $paginateProducts = $paginateProducts->paginate(3);

        return view('site.shop.products.category.product-categories.list', compact('products', 'categories', 'category', 'sizes', 'brands', 'paginateProducts', 'tags'));

    }
}
