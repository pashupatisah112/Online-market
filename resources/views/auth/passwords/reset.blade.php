<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <title>Verify Email</title>
</head>
<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +977 9815790619</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@haatnepal.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="logo pull-left">
                            <a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                @guest
                                  <li><a href="{{ route('userLogin') }}"><i class="fa fa-lock"></i> {{__('words.Login')}}</a></li>
                                @else
                                  <li class="dropdown">
                                    <a id="navbarDropdown" href="#">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{route('user-profile.index')}}"><i class="fa fa-shopping-cart"></i> {{__('words.my_products')}}</a></li>
                                        <li><a href="{{route('ads.create')}}"><i class="fa fa-plus"></i><i class="fa fa-sign-out-alt"></i> {{__('words.Create Ads')}}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                 {{__('words.logout')}}
                                            </a>
                                            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endguest
                                <li><a href=""><i class="fa fa-bullhorn"></i> Sale</a></li>
                                <li><a href="locale/en"><i class="fa fa-globe"></i> Eng</a></li>
                                <li><a href="locale/nep"> नेपाली</a></li>                        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </header>
</body>

