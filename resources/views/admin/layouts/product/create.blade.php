@extends('admin.layouts.main')

@section('head')
<style>
  * {
    box-sizing: border-box;
  }
  
  body {
    font: 16px Arial;  
  }
  
  /*the container must be positioned relative:*/
  .autocomplete {
    position: relative;
    display: inline-block;
  }
  
  .autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
  }
  
  .autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
  }
  
  /*when hovering an item:*/
  .autocomplete-items div:hover {
    background-color: #e9e9e9; 
  }
  
  /*when navigating through the items using the arrow keys:*/
  .autocomplete-active {
    background-color: DodgerBlue !important; 
    color: #ffffff; 
  }
  </style>
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
                </div>
              </div>
              <div class="col-sm-5">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="company" value="{{ old('company')}}" placeholder="Company">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" name="category">
                          <option disabled>Select category</option>
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
                  <div class="input-group mb-3 autocomplete">
                    <input type="text" class="form-control w-100" id="myStreet" type="text" name="street" value="{{ old('street')}}" placeholder="street">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
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
                        <input class="form-check-input" type="radio" name="sell" id="nego1" value="product">
                        <label class="form-check-label" for="nego1">Product</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sell" id="nego2" value="space">
                        <label class="form-check-label" for="nego2">Rental Space</label>
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
                        <input type="file" class="custom-file-input" name="productImage[]" multiple="true" data-max-file-count="5">
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