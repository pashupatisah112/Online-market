
@extends('layouts.main')

@section('body')
<style>
	.pro-img{width:100%;
		height:22rem;
	}
</style>
    <div class="container"style="width:90%">
        <div class="row">
            <div class="col-sm-2">
                @include('layouts.filter')
            </div>
            <div class="col-sm-10 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{__('words.Products')}}</h2>
                    @if ($products->count() > 0))
                    @foreach ($products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ Storage::disk('local')->url($product->image) }}" class="pro-img" alt="image">
                                        <h2>Rs.{{$product->price}}</h2>
                                        <p>{{$product->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Rs.{{$product->price}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <a href="{{route('UserProduct.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
                                        </div>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{route('product-list',$product->category->id)}}"><i class="fa fa-filter"></i>{{$product->category->category_name}}</a></li>
                                    <li><a href="{{route('product-list-city',$product->city->id)}}"><i class="fa fa-location-arrow"></i>{{$product->city->city}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="pager">
                        <li class="next">
                            {{ $products->links() }}
                            <a href="#">Next &rarr;</a>
                        </li>
                    </ul>
                    @endforeach					
                </div>
                @else
                  <h3 class="align-center" style="opacity:0.5">{{__('words.not_found')}}</h3>
                @endif
            </div>
        </div>
    </div>
@endsection