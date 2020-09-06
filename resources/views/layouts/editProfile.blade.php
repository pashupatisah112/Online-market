@extends('layouts.main')

@section('body')
<div class="container">
    <form action="{{ route('user-profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
     <div class="row">
         <div class="col-md-4 col-md-offset-3">
            <p style="margin-bottom: 20px;font-size:25px"><b>Update your Profile</b></p>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
            <div class="col-md-6">
                <input id="phone" type="string" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
         </div>
     </div>
   </form>
</div>
@endsection