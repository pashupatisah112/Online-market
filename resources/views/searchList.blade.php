@extends('layouts.main')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-sm-12 padding-right">
            <h2 class="title text-center">Search Results</h2>
            @if ($products->count() > 0)
            <div class="features_items">
                @foreach ($products as $product)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ Storage::disk('local')->url($product->image) }}" class="pro-img" alt="image">
                                    <h2>Rs.{{$product->price}}</h2>
                                    <p>{{$product->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Rs.{{$product->price}}</h2>
                                        <p>{{$product->product_name}}</p>
                                        <a href="{{route('user-product.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
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
            @elseif($rooms->count() > 0)
            <div class="features_items">
                @foreach ($rooms as $room)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ Storage::disk('local')->url($room->image) }}" class="pro-img" alt="image">
                                    <h2>Rs.{{$room->rent}}</h2>
                                    <p>{{$room->title}}</p>
                                    <a href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Rs.{{$room->rent}}</h2>
                                        <p>{{$room->title}}</p>
                                        <a href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-home"></i>{{$room->type}}</a></li>
                                <li><a href="#"><i class="fa fa-location-arrow">{{ $room->city->city }}</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach	
                <ul class="pager">
                    <li class="next">
                        {{ $rooms->links() }}
                        <a href="#">Next &rarr;</a>
                    </li>
                </ul>             
            </div>
            @elseif($vehicles->count() > 0)
            <div class="features_items">
                @foreach ($vehicles as $vehicle)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ Storage::disk('local')->url($vehicle->image) }}" class="pro-img" alt="image">
                                    <h2>Rs.{{$vehicle->daily_charge}}</h2>
                                    <p>{{$vehicle->title}}</p>
                                    <a href="{{route('user-vehicle.show',$vehicle->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Rs.{{$vehicle->daily_charge}}</h2>
                                        <p>{{$vehicle->title}}</p>
                                        <a href="{{route('user-vehicle.show',$vehicle->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                    </div>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-car"></i>{{$vehicle->vehicle_type}}</a></li>
                                <li><a href="#"><i class="fa fa-location-arrow"></i>{{$vehicle->city->city}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="pager">
                    <li class="next">
                        {{ $vehicles->links() }}
                        <a href="#">Next &rarr;</a>
                    </li>
                </ul>
                @endforeach					
            </div>
            @else
              <h3 class="align-center" style="opacity:0.5">Nothing found. Try different search.</h3>
            @endif
        </div>
    </div>
</div>
@endsection