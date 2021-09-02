<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;

class ShopController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        return view('site.shop.products.index', compact('menu_items'));
    }
}
