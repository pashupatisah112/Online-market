<style>
    .background{
        position: absolute;
        opacity: 0.3;
        width: 100%;
        height: auto;
        }
</style>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="background">
                    <img src="{{asset('imagehs/back-img.png')}}" class="background" alt="">
                </div>
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>{{__('words.haat')}}</span>NEPAL</h1>
                                <h2>{{__('words.buy_title')}}</h2>
                                <p>{{__('words.buy_quote')}}</p>
                                <a href="{{route('product-list','product-list')}}" type="button" class="btn btn-default get">{{__('words.btn_check')}}</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/buy-image.png" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>{{__('words.haat')}}</span>NEPAL</h1>
                                <h2>{{__('words.spaceRental_title')}}</h2>
                                <p>{{__('words.spaceRental_quote')}}</p>
                                <a href="{{route('user-room.index')}}" type="button" class="btn btn-default get">{{__('words.btn_sell')}}</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/sell-image.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>{{__('words.haat')}}</span>NEPAL</h1>
                                <h2>{{__('words.vehicleRental_title')}}</h2>
                                <p>{{__('words.vehicleRental_quote')}}</p>
                                <a href="{{route('user-vehicle.index')}}" type="button" class="btn btn-default get">{{__('words.btn_create')}}</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/rentaL-img.PNG" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        
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