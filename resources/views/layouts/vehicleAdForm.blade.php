
    <style>
        .form-error{border:2px solid red;}
        strong{color:red;}
    </style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                    <h2>Create an Ad for Your Vehicle</h2>
                        <form method="POST" action="{{ route('user-vehicle.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-----hidden user field------>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="inputError" class="@error('title') is-invalid @enderror form-control" style="margin-bottom:10px;" name="title" value="{{ old('title')}}" placeholder="Title for your ad *">
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <select class="form-control" name="vehicle_type" style="margin-bottom:10px;">
                                        <option class="dropdown-item" selected="selected" disabled>Type of Vehicle *</option>
                                        <option value="Car" {{ old('vehicle_type') == 'Car' ? 'selected' : '' }}>Car</option>
                                        <option value="Bus" {{ old('vehicle_type') == 'Bus' ? 'selected' : '' }}>Bus</option>
                                        <option value="Tractor" {{ old('vehicle_type') == 'Tractor' ? 'selected' : '' }}>Tractor</option>
                                        <option value="Micro bus" {{ old('vehicle_type') == 'Micro bus' ? 'selected' : '' }}>Micro bus</option> 
                                        <option value="Truck" {{ old('vehicle_type') == 'Truck' ? 'selected' : '' }}>Truck</option>
                                        <option value="Cycle" {{ old('vehicle_type') == 'Cycle' ? 'selected' : '' }}>Cycle</option>
                                        <option value="Bike" {{ old('vehicle_type') == 'Bike' ? 'selected' : '' }}>Bike</option>
                                        <option value="Scorpio" {{ old('vehicle_type') == 'Scorpio' ? 'selected' : '' }}>Scorpio</option>
                                        <option value="Bolero" {{ old('vehicle_type') == 'Bolero' ? 'selected' : '' }}>Bolero</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="condition" style="margin-bottom:10px;">
                                        <option class="dropdown-item" selected="selected" disabled>Vehicle Condition *</option>
                                        <option value="Brand New" {{ old('condition') == 'Brand New' ? 'selected' : '' }}>Brand New</option>
                                        <option value="Excellent" {{ old('condition') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                        <option value="Good" {{ old('condition') == 'Good' ? 'selected' : '' }}>Good</option>
                                        <option value="Average" {{ old('condition') == 'Average' ? 'selected' : '' }}>Average</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" id="inputError" style="margin-bottom:10px;" class="@error('capacity') is-invalid @enderror form-control" name="capacity" value="{{ old('capacity')}}" placeholder="Vehicle capacity *">
    
                                    @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="city" style="margin-bottom:10px;">
                                        <option class="dropdown-item" selected="selected" disabled>Select City *</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->id}}" {{ old('condition',$city->city) == 'Brand New' ? 'selected' : '' }}>{{$city->city}}</option> 
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="@error('rent') is-invalid @enderror form-control" style="margin-bottom:10px;" name="rent" value="{{ old('rent')}}" placeholder="Rent Per Month *">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col-md-8">
                                    <textarea class="form-control" style="margin-bottom:10px;" rows="7" name="description" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="custom-file-input" style="margin-bottom:10px;" name="vehicleImage" multiple="true" data-max-file-count="5"><br>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</section>

