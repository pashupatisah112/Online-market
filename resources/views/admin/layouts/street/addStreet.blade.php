
<div class="modal fade" id="addStreetModal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a new street</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('street.store') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="form-group">
                        <select class="form-control" name="city">
                          <option disabled>Select city</option>
                          @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>   
                          @endforeach
                        </select>
                      </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Street</label>
                <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="street" required autocomplete="street" autofocus>
                  @error('street')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary btnAdd" value="Add">
          </form>
        </div>
      </div>
    </div>  
  </div>


  

    
                