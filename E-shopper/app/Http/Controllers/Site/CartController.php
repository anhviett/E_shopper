<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function cart(){
        $menu_items = MenuItem::all();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $product = Product::all();
        return view('site.shop.cart', compact('categoriesLimit','product', 'menu_items'));
    }
    public function updateCart(Request $request){
       /* $products = Cart::content();
        foreach ($products as $product){
            if ($product->id == $id){
                $rowId = $product->rowId;
            }
        }*/
        Cart::update($request->rowId, $request->qty);

        return back();
    }
    public function add(Request $request, $id){
        $products = Product::find($id);
        Cart::add([
                'id' => $id,
                'name' => $products->name,
                  'qty' => 1,
                  'price' => $products->price,
                    'weight' => 0
                          ]
        );
        return redirect()->route('product-details.index',$products->id);

    }
    public function deleteCart($id){
        $products = Cart::content();
        foreach ($products as $product){
            if ($product->id == $id){
                $rowId = $product->rowId;
            }
        }
        Cart::remove($rowId);
        return back()->with('success', 'Thêm thành công');

    }
    /*public function add_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart=true){

        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'id' => $data['cart_product_id'],
                'name' => $data['cart_product_name'],

            ),
        }
}*/

}
