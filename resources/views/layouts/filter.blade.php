<style>
    .span2{margin:10px;}
</style>
<div class="left-sidebar">
    <h2>{{__('words.filter')}}</h2>
    <form action="{{route('product.filter')}}" method="post">
      @csrf
        <div class="row">
            <select class="form-control" name="category" style="margin-bottom:10px">
                <option class="dropdown-item" selected="selected" disabled>{{__('words.select_category')}}</option>
                @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->category_name}}</option> 
                @endforeach
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
    
        <div class="row">
          <input type="text" class="form-control form-control-sm" style="margin-bottom:10px"  name="min_price" Placeholder="{{__('words.min_price')}}" autofocus>
        </div>
        <div class="row">
          <input type="text" class="form-control form-control-sm" style="margin-bottom:10px" name="max_price" Placeholder="{{__('words.max_price')}}" autofocus>
        </div>
        <button type="submit" class="btn btn-default get">{{__('words.filter')}}</button>
    </form>
</div>
<img src="{{ Storage::disk('local')->url($adver->image) }}" class="pro-img" alt="image">