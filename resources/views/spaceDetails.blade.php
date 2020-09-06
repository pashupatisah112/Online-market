@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                @include('layouts.filter')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ Storage::disk('local')->url($room->image) }}" alt="image">
                            <h3>ZOOM</h3>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2>{{$room->title}}</h2>
                            <p>{{$room->suitable_for}}</p>
                            <span>
                                <span>Rs.{{$room->rent}}</span>
                            </span>
                            <p><b>Type:</b> {{$room->type}}</p>
                            <p><b>Number of Rooms:</b> {{$room->num_rooms}}</p>
                            <p><b>City:</b> {{$room->city->city}}</p>
                            <p><b>Area:</b> {{$room->street->street_name}}</p>
                            <p><a type="button" class="btn btn-fefault cart">
                                <i class="fa fa-comment"></i>
                                Leave a message
                            </a>
                            </p>
                            
                        </div>
                    </div>
                </div>
                
                <!-----------------------Recommended items-------------------------------------->
                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#description" data-toggle="tab" class="active">Description</a></li>
                            <li><a href="#seller_details" data-toggle="tab">Landlord Details</a></li>
                            <li><a href="#delivery_details" data-toggle="tab">Other Service details</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="description" style="padding-left:5px">
                            {{$room->description}}
                        </div>
                        
                        <div class="tab-pane fade" id="seller_details" style="padding-left:5px">
                            <p><b>Landlord Name:</b> {{$room->user->name}}</p>
                            <p><b>Phone:</b> +977-9815790619</p>
                            <p><b>Email:</b> {{$room->user->email}}</p>
                        </div>
                        
                        <div class="tab-pane fade" id="delivery_details" style="padding-left:5px">
                            <p><b>Drinking water:</b> {{$room->drink_water}}</p>
                            <p><b>Parking:</b> {{$room->parking}}</p>
                            <p><b>Shared kitchen:</b> {{$room->shared_kitchen}}</p>
                            <p><b>Shared bathroom:</b> {{$room->shared_bathroom}}</p>
                            <p><b>Electricity bill included in rent:</b> {{$room->bill_included}}</p>
                            <p><b>Wifi:</b> {{$room->wifi}}</p>
                        </div>
                    </div>
                </div>
                
                <!------------------------streets view----------------------------------------------------->
                  <section id="cart_items">
                    <div class="container">
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Other areas in town</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cart_product">
                                            @foreach ($streets as $street)
                                               <a style="border:1px solid grey;padding:2px;border-radius:5px;color:grey" href="{{route('space-list',$street->id)}}">
                                                  {{$street->street_name}}
                                               </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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
                                                <img src="{{ Storage::disk('local')->url($room->image) }}" alt="image">
                                                <h2>Rs.{{$room->rent}}</h2>
                                                <p>{{$room->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach	
                            </div>
                            <div class="item">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($room->image) }}" alt="" />
                                                <h2>Rs.{{$room->rent}}/Month</h2>
                                                <p>{{$room->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($room->image) }}" alt="" />
                                                <h2>Rs.{{$room->rent}}/Month</h2>
                                                <p>{{$room->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($room->image) }}" alt="" />
                                                <h2>Rs.{{$room->rent}}/Month</h2>
                                                <p>{{$room->title}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('user-room.show',$room->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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