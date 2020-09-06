<style>
    .span2{margin:10px;}
</style>
<div class="left-sidebar">
    <h2>{{__('words.filter')}}</h2>
    <div class="login-form">
    <form action="{{route('vehicle.filter')}}" method="post">
      @csrf
        <div class="row">
            <select class="form-control" name="vehicle_type" style="margin-bottom:10px">
                <<option class="dropdown-item" selected="selected" disabled>{{__('words.vehicle_type')}}</option>
                <option value="Car">Car</option>
                <option value="Bus">Bus</option>
                <option value="Tractor">Tractor</option>
                <option value="Micro bus">Micro bus</option> 
                <option value="Truck">Truck</option>
                <option value="Cycle">Cycle</option>
                <option value="Bike">Cycle</option>
                <option value="Scorpio">Cycle</option>
                <option value="Bolero">Cycle</option>
            </select>
          </div>
        </div>

        <div class="row">
            <select class="form-control" name="city" style="margin-bottom:10px">
              <option class="dropdown-item" selected="selected" disabled>{{__('words.select_city')}}</option>
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->city}}</option> 
                @endforeach
            </select>
          </div>
        </div>
    
        <div class="row">
          <input type="text" class="form-control form-control-sm" style="margin-bottom:10px"  name="min_charge" Placeholder="{{__('words.min_rent')}}" autofocus>
        </div> 
        <div class="row">
            <input type="text" class="form-control form-control-sm" style="margin-bottom:10px" name="max_charge" Placeholder="{{__('words.max_rent')}}" autofocus>
        </div>
        <button type="submit" class="btn btn-default get">{{__('words.filter')}}</button>

        <div class="shipping text-center">
          <img src="images/home/shipping.jpg" alt="" style="width:100%" />
        </div>
    </form>
    </div>
</div>