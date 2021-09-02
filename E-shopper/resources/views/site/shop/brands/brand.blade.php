<div class="brands_products"><!--brands_products-->
    <h2>Thương hiệu</h2>
    <div class="brands-name">
        @foreach($brands as $brand)
            <ul class="nav nav-pills nav-stacked">


                <li><a href="#"> <span class="pull-right">
                                               @php($i = 0)
                @foreach($products as $product_brand)
                                @if($product_brand->brand_id == $brand->id)
                                    @if(isset($category))
                                        @if($product->category_id == @$category->id)
                                            @php($i++)
                                        @endif
                                    @else
                                        @php($i++)
                                    @endif

                                @endif
                            @endforeach
                                               ({{$i}})
                                        </span>{{$brand->name}}</a></li>

            </ul>
        @endforeach
    </div>
</div><!--/brands_products-->
