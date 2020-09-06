@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper p-3">
        <section class="content-header">
            <div class="row">
                <div class="col-md-offset-3">
                    <h2>Add new Advertisement</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('advertisement.index') }}" class="btn btn-primary float-right mr-2"> Cancel</a> 
                </div>
            </div>
        </section>

        <section class="content p-3 mb-5 rounded w-50">
            <div class="container-fluid">
                <form action="{{ route('advertisement.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-8">
                        <div class="row mt-2">
                            <input id="title" type="text" placeholder="Title of your ad" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mt-2">
                            <input type="number" name="num_days" placeholder="Number of days for ads" class="form-control @error('num_days') is-invalid @enderror"  value="{{ old('num_days') }}" required autocomplete="num_days">
                            @error('num_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mt-2">
                            <input type="text" name="link" placeholder="Link to your business" class="form-control @error('link') is-invalid @enderror"  value="{{ old('link') }}" required autocomplete="link">
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mt-2">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="banner">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Banner 185x450 or 1000x185 </label>
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="submit" value="Create" class="btn btn-primary mt-2">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
  