@extends('layouts.main')

@section('body')
<section id="form" style="margin-top:0px;">
    <div class="container">
        <div class="">
            <h2>Descritiptive Search</h2>
            <p class="text-small">Describe the type of product you want</p>
            <form method="POST" action="{{ route('advance.search') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="title" placeholder="Select title of your search">
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <select class="form-control" style="margin-bottom:10px;" name="category" id="category">
                            <option class="dropdown-item" selected="selected" disabled>Select category *</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ old('category', $category->category) == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option> 
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <select class="form-control" style="margin-bottom:10px;" name="city" id="category">
                            <option class="dropdown-item" selected="selected" disabled>Select city *</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}" {{ old('city', $city->city) == $city->id ? 'selected' : '' }}>{{$city->city}}</option> 
                            @endforeach
                        </select>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <textarea name="description" class="form-control"  id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <input type="submit" value="Send" class="btn btn-primary">
            </form>
        </div>
    </div>
</section>
@endsection