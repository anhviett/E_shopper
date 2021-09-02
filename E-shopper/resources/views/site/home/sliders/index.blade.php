<!--slider-->
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        @foreach($sliders as $slider)

                        <div class="item {{$slider['id'] == 1 ? 'active' : ''}}">

                            <div class="col-sm-6 " @if($slider->status == 0)
                            style = "visibility: hidden";
                                @endif>

                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{$slider->title}}</h2>
                                <p>{{$slider->content}}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6" @if($slider->status == 0)
                            style = "visibility: hidden";
                                @endif>

                                <img src="{{asset('/uploads/').'/'.$slider->image_product}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('/uploads/').'/'.$slider->image_pricing}}"  class="pricing" alt="" />

                            </div>

                        </div>
                        @endforeach

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
