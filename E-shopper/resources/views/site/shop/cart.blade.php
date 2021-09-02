@extends('site.layouts.master')
@section('title'){{'Home'}}@endsection
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $products)
                <form action="{{route('cart.update', $products->id)}}">
                    @csrf
                <tr>
                    <td class="cart_product">

                        <a href=""><img src="
                       @foreach($product as $prod)
                            @if($prod->id == $products->id)
                            {{asset('/uploads/').'/'.$prod->avatar}}
                            @endif
                            @endforeach
                            " style="width: 100px; height: 100px;" alt=""></a>


                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$products->name}}</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p>$ {{number_format($products->price,0,',','.')}}</p>
                    </td>
                    <td class="cart_quantity">
                        <button aria-label="Decrease quantity">-</button>
                        <input type="number" name="qty" id="qty" value="{{$products->qty}}" min=""
                        onchange="updateCart(this.value, '{{$products->rowId}}')"
                        >
                        <button aria-label="Increase quantity">+</button>
                        <span id="output" aria-live="polite" aria-atomic="true"></span>


                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">${{$products->price * $products->qty}}
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{route('cart.delete', $products->id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>

                </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></li>
                        <li>Eco Tax <span>${{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{route('home.index')}}">Tiếp tục mua hàng</a>

                    <a class="btn btn-default check_out" href="{{route('checkout.index')}}">Thanh toán</a>


                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
@section('footer_script')
    <script>
        function updateCart(qty, rowId) {
           $.ajax({
               type:'GET',
               url: '{{route('cart.update')}}',
                data:{
                   qty:qty,
                    rowId:rowId
                },
                success: function(data){
                    location.reload();


                }
           })
        }
    </script>
@endsection
