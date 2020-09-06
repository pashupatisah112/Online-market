@extends('admin.layouts.main')

@section('head')

@endsection
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Add a new product</h1>
              </div>
              <div class="col text-right">
                <a href="{{ route('product.index') }}" class="btn btn-primary float-right mr-2"><i class="fas fa-product-plus"></i> Cancel</a> 
              </div>  
            </div>
          </div>
    </section>
    <section class="content offset-md-1">
        <form  autocomplete="off" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-5">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Name of product">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="company" value="{{ old('company')}}" placeholder="Company">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" name="category">
                          <option disabled selected>Select category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" name="condition">
                          <option disabled>Condition</option>
                          <option value="Brand New">Brand New</option>
                          <option value="Excellent">Excellent</option>
                          <option value="Good">Good</option>
                          <option value="Average">Average</option>
                          <option value="Needs Repairing">Needs Repairing</option>
                        </select>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Used Time</label>
                        <select class="form-control" name="used_time">
                          <option disabled>Used time</option>
                          <option value="Less than 3 months">Less than 3 months</option>
                          <option value="Less than 6 months">Less than 6 month</option>
                          <option value="Less than 1 year">Less than 1 year</option>
                          <option value="Less than 2 year">Less than 2 year</option>
                          <option value="Less than 5 Year">Less than 5 years</option>
                          <option value="More than 5 years">More than 5 years</option>
                        </select>
                      </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" name="ad_duration">
                          <option disabled>Ad duration</option>
                          <option value="3 Days">3 Days</option>
                          <option value="1 Week">1 Week</option>
                          <option value="15 Days">15 Days</option>
                          <option value="1 Month">1 Month</option>
                        </select>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <select class="form-control autocomplete"  name="city">
                      <option>select</option>
                      @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>   
                      @endforeach
                    </select>
                  </div>
                  
                </div>
                <div class="col-sm-5">
                    <input list="browsers" name="browser">
                    <datalist id="browsers">
                      <option value="Internet Explorer">
                      <option value="Firefox">
                      <option value="Chrome">
                      <option value="Opera">
                      <option value="Safari">
                    </datalist>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="price" value="{{ old('price')}}" placeholder="price">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <p>Negotiable</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="negotiable" id="nego1" value="Yes">
                        <label class="form-check-label" for="nego1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="negotiable" id="nego2" value="No">
                        <label class="form-check-label" for="nego2">No</label>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <p>Delivery service</p>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="delivery_service" id="delivery1" value="Yes">
                      <label class="form-check-label" for="delivery1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="delivery_service" id="delivery2" value="No">
                      <label class="form-check-label" for="delivery2">No</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="delivery_charge" placeholder="Delivery charge">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="productImage">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                </div>
              </div>
             
              <input type="submit" class="btn btn-primary" value="Submit">
          </form>
    </section>
</div>
    
@endsection
@section('script')
  

@endsection