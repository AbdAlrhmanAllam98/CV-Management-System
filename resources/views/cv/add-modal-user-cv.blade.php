<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New CV</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="add-cv">
                @csrf
                <div class="form-group">
                    <label for="add-userName">CV Name</label>
                    <input type="text" name="add-cvName" id="add-cvName" class="form-control">
                    <small class="form-text text-danger" id="cvName-error-add"></small>
                  </div>
                 
                  <input type="hidden" name="add-userEmail" id="add-userEmail" value="{{$user->email}}">
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>