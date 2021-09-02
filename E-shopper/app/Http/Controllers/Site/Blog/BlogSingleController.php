<?php

namespace App\Http\Controllers\Site\Blog;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogSingleController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $products = Product::all();
        return view('site.blog-single.index', compact('menu_items','product_categories','brands', 'products'));
    }
}
