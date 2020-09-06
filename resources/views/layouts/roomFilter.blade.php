<style>
    .span2{margin:10px;}
</style>
<div class="left-sidebar">
    <h2>{{__('words.filter')}}</h2>
    <div class="login-form">
    <form action="{{route('space.filter')}}" method="post">
      @csrf
        <div class="row">
            <select class="form-control" name="suitable_for" style="margin-bottom:10px">
                <option class="dropdown-item" selected="selected" disabled>{{__('words.space_type')}}</option>
                <option value="Room">Family</option>
                <option value="Flat">Office</option>
                <option value="House">Rent</option>
            </select>
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
          <input type="text" class="form-control form-control-sm" style="margin-bottom:10px"  name="min_rent" Placeholder="{{__('words.min_rent')}}" autofocus>
        </div>
        <div class="row">      
            <input type="text" class="form-control form-control-sm" style="margin-bottom:10px" name="max_rent" Placeholder="{{__('words.max_rent')}}" autofocus>
        </div>
        
        <button type="submit" class="btn btn-default get">{{__('words.filter')}}</button>

        <div class="shipping text-center">
          <img src="images/home/shipping.jpg" alt="" style="width:100%" />
        </div>
    </form>
    </div>
</div>