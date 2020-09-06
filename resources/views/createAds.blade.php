@extends('layouts.main')

@section('body')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{asset('images/createback.svg')}}" style="height:40rem" class="girl img-responsive" alt="" />
            </div>
            <div class="col-sm-6">
                <h1><span>HAAT</span>NEPAL</h1>
                <h2>Choose your Ads</h2>
                <form action="{{route('user-product.create')}}" method="GET">
                    @csrf
                    <div class="custom-control custom-radio">
                        <input type="radio" id="ad1" name="adForm" value="product" class="custom-control-input" checked>
                        <label class="custom-control-label" for="ad1">Create ad to sell your product</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="ad2" name="adForm" value="space" class="custom-control-input">
                        <label class="custom-control-label" for="ad2">Create ad for rental spaces</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="ad3" name="adForm" value="vehicle" class="custom-control-input">
                        <label class="custom-control-label" for="ad3">Create ad for rental vehicles</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Create Now">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection