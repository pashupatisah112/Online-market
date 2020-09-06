@extends('layouts.main')
@section('head')
    <style>
        .form-error{border:2px solid red;}
        strong{color:red;}
    </style>
@show
@section('body')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Create a new ad for your Vehicles</h2>
                        <form method="POST" action="{{ route('UserVehicle.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-----hidden user field------>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="inputError" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" placeholder="Title for your ad">
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group" style="border-radius:0px;border-color:#887E7E;color:#887E7E;margin-bottom:15px;">
                                        <select class="dropdown-menu select2bs4" name="vehicle_type">
                                            <option class="dropdown-item" selected="selected" disabled>Type of Vehicle</option>
                                            <option value="Car">Car</option>
                                            <option value="Bolero">Bolero</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Scorpio">Scorpio</option>
                                            <option value="Micro bus">Micro bus</option>
                                            <option value="Tractor">Tractor</option> 
                                            <option value="Track">Truck</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group" style="border-radius:0px;border-color:#887E7E;color:#887E7E;margin-bottom:15px;">
                                        <select class="dropdown-menu select2bs4" name="condition">
                                            <option class="dropdown-item" selected="selected" disabled>Select category</option>
                                            <option value="Brand New">Brand New</option>
                                            <option value="Excellent">Excellent</option>
                                            <option value="Good">Good</option>
                                            <option value="Average">Average</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="@error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity')}}" placeholder="Capacity to carry people">
                                    @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group inline" style="border-radius:0px;border-color:#887E7E;color:#887E7E">
                                        <select class="dropdown-menu select2bs4" name="city">
                                          <option class="dropdown-item" selected="selected" disabled>Select City</option>
                                          @foreach ($cities as $city)
                                             <option value="{{$city->id}}">{{$city->city}}</option> 
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="@error('charge') is-invalid @enderror" name="charge" value="{{ old('charge')}}" placeholder="Rent">
                                    @error('charge')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="vehicleImage" multiple="true" data-max-file-count="5">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                  </div>
                            </div>
                            
                            <div class="row">
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
  

@endsection