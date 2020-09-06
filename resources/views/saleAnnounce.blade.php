@extends('layouts.main')

@section('body')
    
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
     <div class="container">
         <h2 class="mb-2">Create Sale</h2>
            <form action="{{route('sale')}}" method="post">
                @csrf
                <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none">
                <div class="form-group row justify-content-center">
                    <div class="col-sm-3">
                        <label for="city">Choose city</label>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" style="margin-bottom:10px;" name="city" id="city">
                            <option class="dropdown-item" selected="selected" disabled>Select City *</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}" {{ old('city', $city->city) == $city->id ? 'selected' : '' }}>{{$city->city}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="desc">Products for sale</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="prod" name="prod_desc" placeholder="Name of your products on sale">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="location">Describe Location</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="location" placeholder="Describe exact location">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="date">Enter Date</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"  placeholder="Choose start date" name="start_date"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="end">Day after sale end</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="Count days from now" name="days"/>
                    </div>
                </div>
                
               
                <input type="submit" value="Done" class="btn btn-primary">
            </form>
         
     </div>


<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap',
        dateFormat:'y-m-d',
    });
</script>
@endsection