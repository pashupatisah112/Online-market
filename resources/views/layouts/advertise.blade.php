@extends('layouts.main')

@section('body')
        
            <div class="container">
                <h2>Add New advertisement</h2>
                <form action="{{ route('advertisement.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-4">
                        <div class="row" style="margin-bottom: 10px;">
                            <input id="title" type="text" placeholder="Title of your ad" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row" style="margin-bottom: 10px;">
                            <input type="number" name="num_days" placeholder="Number of days for ads" class="form-control @error('num_days') is-invalid @enderror"  value="{{ old('num_days') }}" required autocomplete="num_days">
                            @error('num_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row" style="margin-bottom: 10px;">
                            <input type="text" name="link" placeholder="Link to your business" class="form-control @error('link') is-invalid @enderror"  value="{{ old('link') }}" required autocomplete="link">
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row" style="margin-bottom: 10px;" >
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="banner">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Banner 185x450</label>
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="submit" value="Create" class="btn btn-primary mt-2">
                    </div>
                </form>
            </div>
@endsection
  