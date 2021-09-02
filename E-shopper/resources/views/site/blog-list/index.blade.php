@extends('site.layouts.master')
@section('title'){{'Blog List'}}@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        @include('site.shop.products.product-categories_menu')
                        @include('site.shop.brands.brand')

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Danh sách Blog mới nhất</h2>
                        @foreach($posts as $post)
                        <div class="single-blog-post" style="padding-top: 30px">
                            <h3>{{$post->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$post->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$post->hours}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$post->days}}</li>
                                </ul>
                                <span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
                            </div>
                            <a href="">
                                <img src="@if($post->image)
                                {{asset('/uploads/').'/'.$post->image}}
                                @else
                                {{asset('/backend/assets/img/images.gif')}}
                                @endif" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a  class="btn btn-primary" href="">Read More</a>
                        </div>
                        @endforeach
                        <div class="pagination-area">
                            <ul class="pagination">
                                <li><a href="" class="active">{!! $posts->links() !!}</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection


