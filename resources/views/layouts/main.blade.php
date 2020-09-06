<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.head')
    @section('head') 
    @endsection
</head>
<body>
    @include('layouts.header')

    @section('body')
    @show
    
    @include('layouts.footer')

    @include('layouts.script')

    @section('script')
    @show
</body>
</html>