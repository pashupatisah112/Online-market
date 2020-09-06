
    <style>
        .form-error{border:2px solid red;}
        strong{color:red;}
    </style>
<section>
    <div class="container">
        <h2>Create a new ad for your Available Space</h2>
        <form method="POST" action="{{ route('user-room.store') }}" enctype="multipart/form-data">
        @csrf
            <!-----hidden user field------>
            <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" style="margin-bottom:10px;" id="inputError" class="@error('title') is-invalid @enderror form-control" name="title" value="{{ old('title')}}" placeholder="Title for your ad *">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <select class="form-control spaceType" style="margin-bottom:10px;" name="type" id="spaceType">
                        <option class="dropdown-item" selected="selected" disabled>Type of space *</option>
                        <option value="Room" {{ old('type') == 'Room' ? 'selected' : '' }}>Room</option>
                        <option value="Flat" {{ old('type') == 'Flat' ? 'selected' : '' }}>Flat</option>
                        <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House</option> 
                    </select>
                </div>

                <div class="col-md-4">
                    <select class="form-control flatType" style="margin-bottom:10px;" name="flat_type" id="flatType">
                        <option class="dropdown-item" selected="selected" disabled>Type of Flat *</option>
                        <option value="1 BHK" {{ old('flat_type') == '1BHK' ? 'selected' : '' }}>1 BHK</option>
                        <option value="2 BHK" {{ old('flat_type') == '2BHK' ? 'selected' : '' }}>2 BHK</option>
                        <option value="3 BHK" {{ old('flat_type') == '3BHK' ? 'selected' : '' }}>3 BHK</option>
                        <option value="4 BHK" {{ old('flat_type') == '4BHK' ? 'selected' : '' }}>4 BHK</option> 
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="floor" id="floor" style="margin-bottom:10px;">
                        <option class="dropdown-item floor" selected="selected" disabled>Floor Level *</option>
                        <option value="Ground Floor" {{ old('floor') == 'Ground Floor' ? 'selected' : '' }}>Ground Floor</option>
                        <option value="First Floor" {{ old('floor') == 'First Floor' ? 'selected' : '' }}>First Floor</option>
                        <option value="Second Floor" {{ old('floor') == 'Second Floor' ? 'selected' : '' }}>Second Floor</option>
                        <option value="Third Floor" {{ old('floor') == 'Third Floor' ? 'selected' : '' }}>Third Floor</option> 
                        <option value="Above Third Floor" {{ old('floor') == 'Above Third Floor' ? 'selected' : '' }}>Above Third Floor</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="text" id="inputError" style="margin-bottom:10px;" class="@error('num_rooms') is-invalid @enderror form-control" name="num_rooms" value="{{ old('num_rooms')}}" placeholder="No of Rooms *">
                    @error('num_rooms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-4">
                  <select class="form-control" name="city" style="margin-bottom:10px;">
                    <option class="dropdown-item" selected="selected" disabled>Select City *</option>
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}" {{ old('city', $city->city) == $city->id ? 'selected' : '' }}>{{$city->city}}</option> 
                    @endforeach
                  </select> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <input type="text" id="myStreet" style="margin-bottom:10px;" class="@error('street') is-invalid @enderror form-control" name="street" value="{{ old('street')}}" placeholder="Street or Tole or Area *">
                    @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <input type="text" style="margin-bottom:10px;" class="@error('rent') is-invalid @enderror form-control" name="rent" value="{{ old('rent')}}" placeholder="Rent Per Month *">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
             
                <div class="col-md-4">
                    <select class="form-control" name="ad_duration" style="margin-bottom:10px;">
                        <option class="dropdown-item" selected="selected" disabled>Ad duration *</option>
                        <option value="3" {{ old('ad_duration') == 3 ? 'selected' : '' }}>3 Days</option>
                        <option value="7" {{ old('ad_duration') == 7 ? 'selected' : '' }}>1 Week</option>
                        <option value="14" {{ old('ad_duration') == 14 ? 'selected' : '' }}>2 Weeks</option>
                        <option value="30" {{ old('ad_duration') == 30 ? 'selected' : '' }}>1 Month</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="suitable_for" style="margin-bottom:10px;">
                        <option class="dropdown-item" selected="selected" disabled>Suitable for *</option>
                        <option value="Student" {{ old('suitable_for') == 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="Family" {{ old('suitable_for') == 'Family' ? 'selected' : '' }}>Family</option>
                        <option value="Office" {{ old('suitable_for') == 'Office' ? 'selected' : '' }}>Office</option>
                        <option value="Shop" {{ old('suitable_for') == 'Shop' ? 'selected' : '' }}>Shop</option> 
                    </select>
                </div>

                <div class="col-md-8">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="water" value="Yes" id="water">
                                <label class="form-check-label" for="water">
                                    Drinkinig water
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="parking" value="Yes" id="parking">
                                <label class="form-check-label" for="parking">
                                    Parking
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="kitchen" value="Yes" id="kitchen">
                                <label class="form-check-label" for="kitchen">
                                    Shared Kitchen
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                          <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="bathroom" value="Yes" id="bathroom">
                            <label class="form-check-label" for="bathroom">
                              Shared Bathroom
                            </label>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="bill" value="Yes" id="bill">
                            <label class="form-check-label" for="bill">
                              Rent include Electric bill
                            </label>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="wifi" value="Yes" id="wifi">
                            <label class="form-check-label" for="wifi">
                              Wifi
                            </label>
                          </div>
                        </div>
                     </div>
                  </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <textarea class="form-control" rows="7" style="margin-bottom:10px;" name="description" placeholder="Enter ..."></textarea>
              </div>

              <div class="col-md-4">
                <input type="file" style="margin-bottom:10px;" class="custom-file-input" name="roomImage" multiple="true" data-max-file-count="5">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
        </form>
    </div>
</section>
@section('script')
<script>
  $("#flatType").prop("disabled", true);
  $("#spaceType").change(function () {
    var selectedValue = $(this).val();
    if( selectedValue == 'Flat')
    {
      $("#flatType").prop("disabled", false);
    }
    else if(selectedValue == 'House')
    {
      $("#floor").prop("disabled", true);
    }
});

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