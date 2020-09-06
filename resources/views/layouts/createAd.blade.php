
<div class="modal fade" id="createAd" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a new add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('product.sell') }}" method="post">
            @csrf
            <div class="form-group row">
                <span>Create ad for</span>
                <div class="form-check form-check">
                    <input class="form-check-input" type="radio" name="adType" id="nego1" value="product">
                    <label class="form-check-label" for="nego1">Secon Had Items</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="radio" name="adType" id="nego2" value="space">
                    <label class="form-check-label" for="nego2">Space Rental</label>
                </div>
                <div class="form-check form-check">
                  <input class="form-check-input" type="radio" name="adType" id="nego3" value="vehicle">
                  <label class="form-check-label" for="nego3">Space Rental</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Go">
        </form>
        </div>
      </div>
    </div>  
  </div>


  

    
                