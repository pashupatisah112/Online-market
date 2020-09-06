
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
                @include('layouts.vehicleFilter')
            </div>
            <div class="col-sm-10 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Vehicle Rental</h2>
                    @if($vehicles->count() > 0)
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
                                    <li><a href="{{route('vehicle-list',$vehicle->vehicle_type)}}"><i class="fa fa-car"></i>{{$vehicle->vehicle_type}}</a></li>
									<li><a href="{{route('vehicle-list',$vehicle->city->city)}}"><i class="fa fa-location-arrow"></i>{{$vehicle->city->city}}</a></li>
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
                  <h3 class="align-center" style="opacity:0.5">No such vehicle available. Try different search.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection