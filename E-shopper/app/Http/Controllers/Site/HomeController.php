<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use App\Models\Style;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $sliders = Slider::all();
        $menu_items = MenuItem::all();
        $recommend_items = Product::take(3)->get();
        $styles = Style::all();

        return view('site.home.index', compact('products','product_categories','categoriesLimit',
            'brands', 'sliders','styles','recommend_items',
        'menu_items'
        ));
    }
}
