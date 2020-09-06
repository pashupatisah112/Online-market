@extends('layouts.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                @include('layouts.filter')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ Storage::disk('local')->url($product->image) }}" alt="image">
                            <h3>ZOOM</h3>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2>{{$product->name}}</h2>
                            <p>{{$product->company}}</p>
                            <span>
                                <span>Rs.{{$product->price}}</span>
                            </span>
                            <p><b>Negotiable:</b> {{$product->negotiable}}</p>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> {{$product->condition}}</p>
                            <p><b>Used Time:</b> {{$product->used_time}}</p>
                            <p><a type="button" class="btn btn-fefault cart">
                                <i class="fa fa-comment"></i>
                                Leave a message
                            </a>
                            </p>
                            
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#description" data-toggle="tab" class="active">Description</a></li>
                            <li><a href="#seller_details" data-toggle="tab">Seller Details</a></li>
                            <li><a href="#delivery_details" data-toggle="tab">Delivery Details</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="description" style="padding-left:5px">
                            {{$product->description}}
                        </div>
                        
                        <div class="tab-pane fade" id="seller_details" style="padding-left:5px">
                            <p><b>Seller Name:</b> {{$product->user->name}}</p>
                            <p><b>Phone:</b> +977-9815790619</p>
                            <p><b>Email:</b> {{$product->user->email}}</p>
                        </div>
                        
                        <div class="tab-pane fade" id="delivery_details" style="padding-left:5px">
                            <p><b>Delivery Service:</b> {{$product->delivery_service}}</p>
                            <p><b>Delivery Charge:</b> {{$product->delivery_charge}}</p>
                        </div>
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach ($recommends as $recommend)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::disk('local')->url($product->image) }}" alt="image">
                                                <h2>Rs.{{$product->price}}</h2>
                                                <p>{{$product->name}}</p>
                                                <a type="button" class="btn btn-default add-to-cart" href="{{route('UserProduct.show',$product->id)}}" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>See Details</a>
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
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
@endsection