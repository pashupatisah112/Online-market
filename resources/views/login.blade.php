@extends('layouts.main')

@section('body')
<section id="form" style="margin-top:0px;"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>{{__('words.login_title')}}</h2>
                    <form action="{{route('login')}}" method="POST">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                  <span>
                                    <input type="checkbox" class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
								    {{__('words.remember')}}
                                  </span>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('words.Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="margin-left:-10px" href="{{ route('password.request') }}">
                                            {{ __('words.Forgot_Password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">{{__('words.or')}}</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>{{__('words.signup_title')}}!</h2>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Phone(Ex-98xxxxxxxx)" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus/>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-default">{{__('words.signup')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection