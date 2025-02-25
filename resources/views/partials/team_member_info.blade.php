<div class="" style="background-color:#273C69; color:#ffffff; padding:2px;">
<div class="row">
    <div class="col-md-6">
        <h4>New Team Member</h4>
        </div>
     <div class="col-md-6" style="text-align:right;">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teamMemberModal">
  <i class="fa fa-plus"></i> Add New Team Member
</button>
        </div>



</div>
</div>

<!-- <div id="second_part">

</div> -->

<div class="modal fade" id="teamMemberModal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Add New Team Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- You can include your form or any content here -->
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Team Member Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name">
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" placeholder="Enter role">
          </div>
          <!-- Add more fields as needed -->
        </form>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>