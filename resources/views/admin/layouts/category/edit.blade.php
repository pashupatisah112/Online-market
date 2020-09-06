@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit category</h1>
        </div>
        <div class="col text-right">
          <a href="{{ route('category.index') }}" class="btn btn-primary float-right mr-2"><i class="fas fa-product-plus"></i> Cancel</a> 
        </div>  
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="col-md-4">
      <form action="{{ route('category.update',$category->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
            <input type="text" value="{{ $category->category_name }}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Done">
    </form>
    </div>
    </div>
  </section>
@endsection