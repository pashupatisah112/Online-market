
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
                @include('layouts.roomFilter')
            </div>
            <div class="col-sm-10 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Space Rental</h2>
                    @if ($spaces->count() > 0))
                    @foreach ($spaces as $space)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ Storage::disk('local')->url($space->image) }}" class="pro-img" alt="image">
                                        <h2>Rs.{{$space->rent}}</h2>
                                        <p>{{$space->title}}</p>
                                        <a href="{{route('user-room.show',$space->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Rs.{{$space->rent}}</h2>
                                            <p>{{$space->title}}</p>
                                            <a href="{{route('user-room.show',$space->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                        </div>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{route('space-list',$space->type)}}"><i class="fa fa-home"></i>{{$space->type}}</a></li>
									<li><a href="{{route('space-list',$space->city->city)}}"><i class="fa fa-location-arrow"></i>{{$space->city->city}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach	
                    <ul class="pager">
                        <li class="next">
                            {{ $spaces->links() }}
                            <a href="#">Next &rarr;</a>
                        </li>
                    </ul>
                    			
                </div>
                @else
                  <h3 class="align-center" style="opacity:0.5">No such space available. Try different search.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection