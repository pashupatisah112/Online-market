@extends('layouts.main')

@section('head')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
@endsection
@section('body')
<style>
    .text-right i{
        color:red;
        margin-right:5px;
        }
    .text-right i:hover{
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @php
                    $name= Auth::user()->name;
                    $authname=ucfirst($name);
                @endphp
                <h2>{{$authname}}</h2>
                <p>Phone: {{Auth::user()->phone}}</p>
                <p>Email: {{Auth::user()->email}}</p>
                <p>Member since:
                    @php
                        $date=Auth::user()->created_at;
                        echo date_format($date,'y-m-d');
                    @endphp 
                </p>
                <a class="btn btn-primary" style="width:80%"  href="{{route('ads.create')}}">{{__('words.add_new')}} <i class="fa fa-plus "></i></a>
                <a class="btn btn-primary" style="width:80%" href="{{route('user-profile.edit',Auth::user()->id)}}">{{__('words.edit_profile')}} <i class="fa fa-edit "></i></a>
                <a class="btn btn-primary" style="width:80%" href="{{route('user-profile.destroy',Auth::user()->id)}}">{{__('words.delete_profile')}} <i class="fa fa-times"></i></a>
            </div>
            <div class="col-sm-10">
              <div class="category-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#all" data-toggle="tab">{{__('words.Products')}}</a></li>
                    <li><a href="#online" data-toggle="tab">{{__('words.space_rental')}}</a></li>
                    <li><a href="#offline" data-toggle="tab">{{__('words.vehicle_rental')}}</a></li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="all" >
                    @if($products->count() > 0)
                        @foreach ($products as $product)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <span class="badge badge-primary" style="position: absolute;left:5;top:5;margin:2px;">
                                  @php
                                    $current_timestamp = now(); 
                                    $date=$product->created_at;
                                    if($product->status == 1)
                                    {
                                      $exp=date_create($product->expires_at);
                                      $cre=date_create($product->created_at); 
                                      $result=$cre->diff($exp);
                                      $daysLeft=$result->format('%R%a Days left');
                                      echo $daysLeft;
                                    }else{
                                        echo "Offine";
                                    }
                                  @endphp                                    
                                </span>
                                <div class="single-products">
                                    <div class="text-right">
                                        <a href="{{route('user-product.edit',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit "></i></a>
                                        <a href="{{route('product.delete',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                                        @if($current_timestamp > $date && $product->status == 1)
                                          <a href="#" onclick="document.getElementById('status').submit();" data-toggle="tooltip" data-placement="top" title="Set offline"><i class='fa fa-eye-slash'></i></button>
                                          <form action="{{route('statusOff',$product->id)}}" method="post" id="status">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                          </form>
                                        @else
                                        <a href="#" onclick="document.getElementById('status').submit();" data-toggle="tooltip" data-placement="top" title="Set online"><i class='fa fa-eye'></i></button>
                                            <form action="{{route('statusOn',$product->id)}}" method="post" id="status">
                                              {{ csrf_field() }}
                                              {{ method_field('PATCH') }}
                                        @endif
                                    </div>
                                    <div class="productinfo text-center">
                                        <img src="{{ Storage::disk('local')->url($product->image) }}" alt="image not available">
                                        <h2>Rs.{{$product->price}}</h2>
                                        <p>product_name</p>
                                        <a href="{{route('user-product.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                      <div class=" col-md-offset-4">
                        <h1 style="opacity:0.5">No Ads</h1>
                        <a href="{{route('ads.create')}}" class="btn btn-secondary">Create Now <i class="fa fa-plus"></i></a>
                      </div>
                    @endif
                </div>
                    
                <div class="tab-pane fade" id="online" >
                  @if($rentals->count() > 0)
                    @foreach ($rentals as $rental)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <span class="badge badge-primary" style="position: absolute;left:5;top:5;margin:2px;">
                                @php
                                  $current_timestamp = now(); 
                                  $dateRoom=$rental->created_at;
                                  if($rental->status == 1)
                                  {
                                    $exp=date_create($rental->expires_at);
                                    $cre=date_create($rental->created_at); 
                                    $result=$cre->diff($exp);
                                    $daysLeft=$result->format('%R%a Days left');
                                    echo $daysLeft;
                                  }else{
                                      echo "Offline";
                                  }
                                @endphp
                            </span>
                            <div class="single-products">
                                <div class="text-right">
                                    <a href="{{route('user-room.edit',$rental->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit "></i></a>
                                    <a href="{{route('room.delete',$rental->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>  
                                    @if($current_timestamp > $dateRoom && $rental->status == 1)
                                        <a href="#" onclick="document.getElementById('statusRoom').submit();" data-toggle="tooltip" data-placement="top" title="Set offline"><i class="fa fa-eye-slash"></i></button>
                                        <form action="{{route('off',$rental->id)}}" method="post" id="statusRoom">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                        </form> 
                                    @else
                                    <a href="#" onclick="document.getElementById('statusRoom').submit();" data-toggle="tooltip" data-placement="top" title="Set online"><i class='fa fa-eye'></i></button>
                                        <form action="{{route('on',$rental->id)}}" method="post" id="statusRoom">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                        </form> 
                                    @endif     
                                </div>
                                <div class="productinfo text-center">
                                    <img src="{{ Storage::disk('local')->url($rental->image) }}" alt="image not available">
                                    <h2>Rs.{{$rental->price}}</h2>
                                    <p>product_name</p>
                                    <a href="{{route('user-room.show',$rental->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class=" col-md-offset-4">
                        <h1 style="opacity:0.5">No Ads</h1>
                        <a href="{{route('ads.create')}}" class="btn btn-secondary">Create Now <i class="fa fa-plus"></i></a>
                      </div>
                    @endif
                </div>
                    
                <div class="tab-pane fade" id="offline" >
                    @if($vehicles->count() >0)
                      @foreach ($vehicles as $vehicle)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="text-right">
                                        <a href="{{route('user-vehicle.edit',$vehicle->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit "></i></a>
                                        <a href="{{route('vehicle.delete',$vehicle->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="productinfo text-center">
                                        <img src="{{ Storage::disk('local')->url($vehicle->image) }}" alt="image not available">
                                        <h2>Rs.{{$vehicle->price}}</h2>
                                        <p>product_name</p>
                                        <a href="{{route('user-vehicle.show',$vehicle->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('words.see_details')}}</a>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class=" col-md-offset-4">
                            <h1 style="opacity:0.5">No Ads</h1>
                            <a href="{{route('ads.create')}}" class="btn btn-secondary">Create Now <i class="fa fa-plus"></i></a>
                          </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection