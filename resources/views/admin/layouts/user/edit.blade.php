@extends('admin.layouts.main')

@section('content')
  <div class="content-wrapper ">
      <section class="content-header">
          <div class="row">
              <div class="col">
                <h2>Add new user</h2>
              </div>
              <div class="col text-right">
                <a href="{{ route('user.index') }}" class="btn btn-primary float-right mr-2"><i class="fas fa-user-plus"></i> Cancel</a> 
              </div>
          </div>
      </section>
      <section class="content shadow p-3 mb-5 bg-white rounded w-50 offset-md-3">
      <div class="container-fluid">
       <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf

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
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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

                      <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                          <label for="exampleInputFile">File input</label>
                        </div>
                        <div class="col-md-6 text-md-left">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="profile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                        </div>
                    </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Register') }}
                              </button>
                          </div>
                      </div>

      </form>
</div>
      </section>
  </div>
  @endsection
  