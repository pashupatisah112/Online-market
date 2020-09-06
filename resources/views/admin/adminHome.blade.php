@extends('admin.layouts.main')

@section('content')
<style>
  .color{background-color: #FE980F}
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!----------users------------->  
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------product ads----------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$products}}<sup style="font-size: 20px"></sup></h3>
              <p>Product Ads</p>
            </div>
            <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------------Room ads------------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$rooms}}</h3>
              <p>Room Ads</p>
            </div>
            <div class="icon">
                <i class="fas fa-home"></i>
            </div>
            <a href="{{ route('room.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------------Vehicles---------------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$vehicles}}</h3>
              <p>Vehicle ads</p>
            </div>
            <div class="icon">
                <i class="fas fa-truck-monster"></i>
            </div>
            <a href="{{ route('vehicle.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <!----------Category------------->  
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$categories}}</h3>
              <p>Categories</p>
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------city----------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$cities}}<sup style="font-size: 20px"></sup></h3>
              <p>Total city</p>
            </div>
            <div class="icon">
                <i class="fas fa-city"></i>
            </div>
            <a href="{{ route('city.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------------streets------------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$streets}}</h3>
              <p>Total Streets</p>
            </div>
            <div class="icon">
                <i class="fas fa-road"></i>
            </div>
            <a href="{{ route('street.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-----------------advertisement---------------------->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$advertisements}}</h3>
              <p>Advertisement</p>
            </div>
            <div class="icon">
                <i class="fas fa-ad"></i>
            </div>
            <a href="{{ route('advertisement.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection