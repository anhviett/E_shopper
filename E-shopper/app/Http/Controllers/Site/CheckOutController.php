<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;

use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index(){
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $products = Cart::content();
        $product = Product::all();
        $menu_items = MenuItem::all();
        return view('site.checkout.index', compact('categoriesLimit','products','product', 'menu_items'));
    }



    public function save_checkout(Request $request){
        $shipping = new Shipping();
        $shipping->shipping_name = $request->input('shipping_name');
        $shipping->shipping_email = $request->input('shipping_email');
        $shipping->shipping_phone = $request->input('shipping_phone');
        $shipping->shipping_notes = $request->input('shipping_notes');
        $shipping->shipping_address = $request->input('shipping_address');
        $shipping->save();
        Session::put('id', $shipping->id);
        if ($shipping){
            return Redirect::route('payment')->with('success','Đăng ký thành công');
        }else{
            return back()->with('error','Thất bại');
        }
    }

    public function payment(){
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $products = Cart::content();
        $product = Product::all();

        $brands = Brand::all();
        return view('site.checkout.payment.payment',compact('categoriesLimit', 'products','product_categories','brands','product'));
    }

    public function order_place(Request $request){
        //insert payment

        $payment = new Payment();
        $payment->payment_method = $request->input('payment_option');
        $payment->payment_status = 'Chờ xử lý';

        $payment_id = $payment->save();



        //insert order
        $orderItem = new Order();

        $orderItem->customer_id = \App\Models\Customer::get('id');
        $orderItem->shipping_id = \App\Models\Shipping::get('id');

        $orderItem->payment_id = $payment_id;
        $orderItem->order_total = Cart::total();
        $orderItem->order_status = 'Chờ xử lý';
        $order_id = $orderItem->save();

        //insert order_dertail
        $order_d = new OrderDetail();
        $content = Cart::content();

        foreach ($content as $value){
            $order_d->order_id = $order_id;
            $order_d->product_id = $value->id;
            $order_d->product_name = $value->name;
            $order_d->product_price = $value->price;
            $order_d->product_sales_quantity = $value->qty;
            $order_d->save();
        }
        if ($payment->payment_method == 1){
            echo 'Thanh toán bằng thẻ ATM';
        }elseif ($payment->payment_method == 2){
            $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
            $products = Cart::content();
            $product = Product::all();
            Cart::destroy();
            return view('site.checkout.payment.spotcash', compact('categoriesLimit', 'product','products'));
        }else{
            echo 'ghi nợ';
        }

    }








}
