<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
    btn-primary{
        background-color: orange;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <b>{{ __('Welcome Admin') }}</b>
                    </div>
    
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
    
                            <div class="form-group row">
    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group row">

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group row mb-0">
                                    <button type="submit" class="btn btn-primary" style="background-color:orange;border:0px;">
                                        {{ __('Login') }}
                                    </button>
                                    <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.script')
</body>
</html>
