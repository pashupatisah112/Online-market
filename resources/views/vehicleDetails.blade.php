@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                @include('layouts.roomFilter')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ Storage::disk('local')->url($vehicle->image) }}" alt="image">
                            <h3>ZOOM</h3>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2>{{$vehicle->title}}</h2>
                            <p>{{$vehicle->vehicle_type}}</p>
                            <span>
                                <span>Rs.{{$vehicle->daily_charge}}</span>
                            </span>
                            <p><b>Condition:</b> {{$vehicle->condition}}</p>
                            <p><b>Capacity:</b> {{$vehicle->capacity}}</p>
                            <p><b>City:</b> {{$vehicle->city->city}}</p>
                            <p><a type="button" class="btn btn-fefault cart">
                                <i class="fa fa-comment"></i>
                                Leave a message
                            </a>
                            </p>
                            
                        </div>
                    </div>
                </div>
                
                <!-----------------------tab details-------------------------------------->
                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#description" data-toggle="tab" class="active">Description</a></li>
                            <li><a href="#seller_details" data-toggle="tab">Owner Details</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="description" style="padding-left:5px">
                            {{$vehicle->description}}
                        </div>
                        
                        <div class="tab-pane fade" id="seller_details" style="padding-left:5px">
                            <p><b>Landlord Name:</b> {{$vehicle->user->name}}</p>
                            <p><b>Phone:</b> +977-9815790619</p>
                            <p><b>Email:</b> {{$vehicle->user->email}}</p>
                        </div>
                    </div>
                </div>
                
                  
                <!------------------------Recommendations-------------------------------------------------->
                <div class="recommended_items">
                    <h2 class="title text-center">recommended items</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active in">
                                @foreach ($recommends as $recommend)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($recommend->image) }}" alt="image">
                                                <h2>Rs.{{$recommend->daily_charge}}</h2>
                                                <p>{{$recommend->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-vehicle.show',$recommend->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach	
                            </div>
                            <div class="item">
                                @foreach ($recommend2 as $reco)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($reco->image) }}" alt="" />
                                                <h2>Rs.{{$reco->daily_charge}}/Month</h2>
                                                <p>{{$reco->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-vehicle.show',$reco->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection