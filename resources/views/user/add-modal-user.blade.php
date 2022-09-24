<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="add-user">
                @csrf
                <div class="form-group">
                    <label for="add-userName">User Name</label>
                    <input type="text" name="add-userName" id="add-userName" class="form-control">
                    <small class="form-text text-danger" id="userName-error-add"></small>
                </div>
                  <div class="form-group">
                    <label for="add-email">Email</label>
                    <input type="text" name="add-email" id="add-email" class="form-control">
                    <small class="form-text text-danger" id="email-error-add"></small>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
