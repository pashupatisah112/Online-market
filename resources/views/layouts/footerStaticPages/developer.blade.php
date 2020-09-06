@extends('layouts.main')
<head>
    <link rel="stylesheet" href="{{asset('css/developer.css')}}">
</head>
@section('body')
<div class="container" style="margin-bottom:5rem;">
	<div class="row">
		<div class="col-md-12">
            <h3 class="text-center">About Developer</h3>
            <div class="card hovercard" style="width:60%;height:35rem;box-shadow:0px 5px 10px grey;margin:auto;">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="{{asset('images/developer_img.jpg')}}">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#">Pashupati Sah</a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection