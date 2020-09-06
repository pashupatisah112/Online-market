@extends('layouts.main')
@section('body')
    @if($adType == 'product')
        @include('layouts.productAdForm')
    @elseif($adType == 'space')
        @include('layouts.spaceAdForm')
    @elseif($adType == 'vehicle')
        @include('layouts.vehicleAdForm')
    @endif
@endsection
