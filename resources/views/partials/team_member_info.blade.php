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
<br>
<div id="second_part">

</div>

<script>
$(document).ready(function() {
    function loadTeamMembers() {
        $.ajax({
            url: "{{ route('team-members.list') }}",
            type: "GET",
            success: function(response) {
                $("#second_part").html(response);
                $("#teamMembersTable").DataTable(); // Initialize DataTable
            },
            error: function(xhr) {
                console.error("Error loading team members:", xhr.responseText);
            }
        });
    }

    loadTeamMembers(); // Call function to load data on page load
});
</script>


<div class="modal fade" id="teamMemberModal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- Larger modal -->
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Add New Team Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form>
          <div class="row">
            <!-- Full Name -->
            <div class="col-md-4 mb-3">
              <label for="name" class="form-label"><strong>Full Name</strong> <span style="color:red">*</span></label>
              <input type="text" class="form-control" id="name" placeholder="Enter full name" required>
            </div>

            <!-- Role/Designation -->
            <div class="col-md-4 mb-3">
              <label for="role" class="form-label"><strong>Designation </strong> <span style="color:red">*</span> </label>
              <input type="text" class="form-control" id="role" placeholder="Enter role (e.g., Senior Associate)" required>
            </div>

            <!-- Email -->
            <div class="col-md-4 mb-3">
              <label for="email" class="form-label"><strong>Email Address</strong> </label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
          </div>

          <div class="row">
            <!-- Phone Number -->
            <div class="col-md-4 mb-3">
              <label for="phone" class="form-label"><strong>Phone Number</strong></label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone number" required>
            </div>

            <!-- Experience (Years) -->
            <div class="col-md-4 mb-3">
              <label for="experience_years" class="form-label"><strong>Years of Experience</strong></label>
              <input type="number" class="form-control" id="experience_years" placeholder="Enter years of experience" required>
            </div>

            <!-- Education Background -->
            <div class="col-md-4 mb-3">
              <label for="education" class="form-label"> <strong>Educational Background</strong></label>
              <textarea class="form-control" id="education" rows="1" placeholder="Enter qualifications (e.g., LL.B., LL.M.)" required></textarea>
            </div>
          </div>

          <div class="row">
            <!-- Brief Description -->
            <div class="col-md-6 mb-3">
              <label for="description" class="form-label"> <strong> Description</strong></label>
              <textarea class="form-control" id="description" rows="2" placeholder="Write a short description..." required></textarea>
            </div>

            <!-- Experience & Notable Cases -->
            <div class="col-md-6 mb-3">
              <label for="notable_cases" class="form-label"><strong>Experience</strong></label>
              <textarea class="form-control" id="notable_cases" rows="2" placeholder="List experience, cases handled, or key contributions..." required></textarea>
            </div>
          </div>

          <div class="row">
            <!-- Profile Picture Upload -->
            <div class="col-md-6 mb-3">
              <label for="profile_picture" class="form-label"><strong>Profile Picture</strong></label>
              <input type="file" class="form-control" id="profile_picture" accept="image/*" onchange="previewImage(event)">
            </div>

            <!-- Profile Picture Preview -->
            <div class="col-md-6 text-center">
              <img id="image_preview" src="#" alt="Profile Picture Preview" style="display: none; max-width: 100px; border-radius: 10px; margin-top: 10px;">
            </div>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveTeamMember" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById("image_preview");

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = "block";
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>


<script>
$(document).ready(function() {
    $('#saveTeamMember').click(function(e) {
        e.preventDefault();

        let formData = new FormData();
        formData.append('name', $('#name').val());
        formData.append('role', $('#role').val());
        formData.append('email', $('#email').val());
        formData.append('phone', $('#phone').val());
        formData.append('experience_years', $('#experience_years').val());
        formData.append('education', $('#education').val());
        formData.append('description', $('#description').val());
        formData.append('notable_cases', $('#notable_cases').val());
        formData.append('profile_picture', $('#profile_picture')[0].files[0]); // File upload

        $.ajax({
            url: "{{ route('team-members.store') }}", // Laravel route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                // alert(JSON.stringify(response));

                if (response.success) {
                    alert("Team Member added successfully!");
                    $('#teamMemberModal').modal('hide');
                    // location.reload();

                } else {
                    alert("Something went wrong!");
                }
            },
            error: function(xhr) {
                alert("Error occurred: " + xhr.responseText);
            }
        });
    });
});






</script>
