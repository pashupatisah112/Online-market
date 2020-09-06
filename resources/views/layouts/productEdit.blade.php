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
        <h2>Update your Product Info here</h2>
            <form method="POST" action="{{route('user-product.update',$product->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <!-----hidden user field------>
                <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="inputError" class="@error('title') is-invalid @enderror form-control" style="margin-bottom:10px;" name="title" value="{{ $product->title }}" placeholder="Title of your ad *">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="@error('company') is-invalid @enderror form-control" style="margin-bottom:10px;" name="company" value="{{ $product->company }}" placeholder="Company of product">
                        @error('company')
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
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="@error('price') is-invalid @enderror form-control" style="margin-bottom:10px;" name="price" value="{{ $product->price }}" placeholder="Enter your price *">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <select class="form-control" style="margin-bottom:10px;" name="city" id="city">
                            <option class="dropdown-item" selected="selected" disabled>Select City *</option>
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
                    
                    <div class="col-md-4">
                        <input type="text" id="myStreet" class="@error('street') is-invalid @enderror form-control" style="margin-bottom:10px;" name="street" value="{{ $product->street->street_name }}" placeholder="Street or Tole or Area *">
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" style="margin-bottom:10px;" name="condition" id="condition">
                            <option class="dropdown-item" selected="selected" disabled>Condition of your product *</option>
                            <option value="Brand New" {{ old('condition') == 'Brand New' ? 'selected' : '' }}>Brand New</option>
                            <option value="Excellent" {{ old('condition') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                            <option value="Good" {{ old('condition') == 'Good' ? 'selected' : '' }}>Good</option>
                            <option value="Average" {{ old('condition') == 'Average' ? 'selected' : '' }}>Average</option>
                            <option value="Needs repairing" {{ old('condition') == 'Needs repairing' ? 'selected' : '' }}>Needs Repairing</option>
                        </select>
                        @error('condition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
 
                    <div class="col-md-4">
                        <select class="form-control" name="ad_duration" id="ad_duration" style="margin-bottom:10px;">
                            <option class="dropdown-item" selected="selected" disabled>Ad duration *</option>
                            <option value="3" {{ old('ad_duration') == 3 ? 'selected' : '' }}>3 Days</option>
                            <option value="7" {{ old('ad_duration') == 7 ? 'selected' : '' }}>1 Week</option>
                            <option value="14" {{ old('ad_duration') == 14 ? 'selected' : '' }}>2 Weeks</option>
                            <option value="30" {{ old('ad_duration') == 30 ? 'selected' : '' }}>1 Month</option> 
                        </select>
                        @error('ad_duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div style="margin-bottom:10px;">
                            <p style="float:left;margin-right:20px;"><b>Negotiable</b></p>
                            @if ($product->negotiable == 'Yes')
                                <input type="radio" name="negotiable" id="nego1" value="Yes" checked>
                            @else
                                <input type="radio" name="negotiable" id="nego1" value="Yes"> 
                            @endif
                            
                            <label for="nego1" style="margin-right:10px">Yes</label>
                            @if ($product->negotiable == 'No')
                                <input type="radio" name="negotiable" id="nego2" value="No" checked>
                            @else
                                <input type="radio" name="negotiable" id="nego2" value="No">
                            @endif
                            <label for="nego2">No</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="@error('charge') is-invalid @enderror form-control" style="margin-bottom:10px;" id="charge" name="charge" value="{{ $product->price}}" placeholder="Delivery Charge">
                        @error('charge')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <select class="form-control" name="used_time" id="used_time" style="margin-bottom:10px;">
                            <option class="dropdown-item" selected="selected" disabled>Used Time *</option>
                            <option value="Less than 3 months" {{ old('used_time') == 'Less than 3 months' ? 'selected' : '' }}>Less than 3 monthss</option>
                            <option value="Less than 6 months" {{ old('used_time') == 'Less than 6 months' ? 'selected' : '' }}>Less than 6 months</option>
                            <option value="Less than 1 year" {{ old('used_time') == 'Less than 1 year' ? 'selected' : '' }}>Less than 1 year</option>
                            <option value="Less than 2 years" {{ old('used_time') == 'Less than 2 years' ? 'selected' : '' }}>Less than 2 years</option>
                            <option value="Less than 5 years" {{ old('used_time') == 'Less than 5 years' ? 'selected' : '' }}>Less than 5 years</option>
                            <option value="More than 5 years"{{ old('used_time') == 'More than 5 years' ? 'selected' : '' }}>More than 5 years</option> 
                        </select>
                        @error('used_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="col-md-4">
                      <div style="margin-bottom:10px;">
                        <p style="float:left;margin-right:20px;"><b>Delivery service</b></p>

                        @if ($product->delivery_service == 'Yes')
                            <input type="radio" name="delivery_service" id="delivery1" value="Yes" checked>
                        @else
                            <input type="radio" name="delivery_service" id="delivery1" value="Yes">
                        @endif
                        <label for="delivery1" style="margin-right:10px">Yes</label>

                        @if ($product->delivery_service == 'Yes')
                            <input type="radio" name="delivery_service" id="delivery2" value="No" checked>
                        @else
                            <input type="radio" name="delivery_service" id="delivery2" value="No">
                        @endif
                        <label for="delivery2">No</label>
                      </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8" style="margin-bottom:10px;">
                        <textarea class="form-control" rows="7" name="description" placeholder="Enter ...">{{$product->description}}</textarea>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group" style="margin-bottom:10px;">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="productImage" multiple="true" data-max-file-count="5">
                              @error('productImage')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:20%">Update</button>
                    </div>
                </div>
            </form>
    </div>
</section>
@endsection

@section('script')
<script>
    
    $("#delivery2").on("click", function() {
        $("#charge").prop("disabled", true);
    });

</script>
<script type="text/javascript">
//sets dynamic value for combobox
    var category = "{{$product->category_id}}";
    document.querySelector('#category').value = category;

    var condition = "{{$product->condition}}";
    document.querySelector('#condition').value = condition;

    var used_time = "{{$product->used_time}}";
    document.querySelector('#used_time').value = used_time;

    var ad_duration = "{{$product->ad_duration}}";
    document.querySelector('#ad_duration').value = ad_duration;

    var city = "{{$product->city_id}}";
    document.querySelector('#city').value = city;

</script> 

<script>
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  /*An array containing all the country names in the world:*/
  var streets =<?php echo json_encode($streets_name); ?>;
  
  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("myStreet"), streets);
  </script>
@endsection