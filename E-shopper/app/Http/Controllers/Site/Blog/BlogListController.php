<?php

namespace App\Http\Controllers\Site\Blog;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $products = Product::all();
        $posts = Post::orderBy('category_id', 'DESC')->paginate(2);
        return view('site.blog-list.index', compact('menu_items',
            'product_categories', 'brands',
            'products', 'posts'));
    }
}
