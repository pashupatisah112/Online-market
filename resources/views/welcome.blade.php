@extends('layouts.main')

@section('body')
<style>
	.pro-img{width:100%;
		height:22rem;
	}
</style>
    @include('layouts.slider')
    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					@include('layouts.filter')
				</div>
				
				<div class="col-sm-10 padding-right">
					<div class="features_items">
						<h2 class="title text-center">{{__('words.newly_added')}}</h2>
						@foreach ($products as $product)
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ Storage::disk('local')->url($product->image) }}" class="pro-img" alt="image">
											<h2>Rs.{{$product->price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{route('user-product.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rs.{{$product->price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{route('user-product.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{route('product-list',$product->category->id)}}"><i class="fa fa-filter"></i>{{$product->category->category_name}}</a></li>
										<li><a href="#"><i class="fa fa-location-arrow"></i>{{$product->city->city}}</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach					
					</div>
					
					<div class="features_items">
						<h2 class="title text-center">{{__('words.space_rental')}}</h2>
						@foreach ($rooms as $room)
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ Storage::disk('local')->url($room->image) }}" class="pro-img" alt="image">
											<h2>Rs.{{$room->rent}} /Month</h2>
											<p>{{$room->title}}</p>
											<a href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rs.{{$room->rent}} /Month</h2>
											    <p>{{$room->title}}</p>
											    <a href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-home"></i>{{$room->type}}</a></li>
										<li><a href="#"><i class="fa fa-location-arrow"></i>{{$room->city->city}}</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach					
					</div>

					<div class="features_items">
						<h2 class="title text-center">{{__('words.vehicle_rental')}}</h2>
						@foreach ($vehicles as $vehicle)
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ Storage::disk('local')->url($vehicle->image) }}" class="pro-img" alt="image">
											<h2>Rs.{{$vehicle->daily_charge}} /Day</h2>
											<p>{{$vehicle->title}}</p>
											<a href="{{route('user-vehicle.show',$vehicle->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rs.{{$vehicle->daily_charge}} /Day</h2>
											    <p>{{$vehicle->title}}</p>
											    <a href="{{route('user-vehicle.show',$vehicle->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
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
						@endforeach					
					</div>
				</div>
			</div>
		</div>
	</section>
	@guest
		@include('sale')
	@else
	    @include('sale')
		@include('saleAnnounce')
	@endguest
@endsection