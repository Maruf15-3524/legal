<div class="" style="background-color:#273C69; color:#ffffff; padding:2px;">
<div class="row">
    <div class="col-md-6">
        <h4>Research</h4>
        </div>
     <div class="col-md-6" style="text-align:right;">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_research_info_modal" >
  <i class="fa fa-plus"></i> Add New Research
</button>
        </div>
</div>
</div>
<br>

<div id="second_part">
</div>


<div class="modal fade" id="add_research_info_modal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> 
  <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Add New Research Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- Row 1 -->
          <div class="row">
                        <div class="col-md-4">
                            <label class="form-label"><b>Research Head</b> <span style="color:red">*</span></label>
                            <input type="text" name="research_head" id="research_head" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Journal Name</b></label>
                            <input type="text" name="journal_name" id="journal_name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Publication Date</b></label>
                            <input type="date" name="publication_date" id="publication_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label"><b>Description</b></label>
                            <input type="text" name="extra_info" id="extra_info" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Upload PDF</b> <span style="color:red">*</span></label>
                            <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Upload Head Image</b> <span style="color:red">*</span></label>
                            <input type="file" name="head_image" id="head_image" class="form-control" accept="image/*" required>
                        </div>
                    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="" class="btn btn-primary" onclick="add_new_research()" data-bs-dismiss="modal">save</button>
      </div>
</div>
</div>
</div>

<div class="modal fade" id="edit_research_info_modal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> 
  <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Add New Research Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_reasearch_info_body">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="" class="btn btn-primary" onclick="update_research()" data-bs-dismiss="modal">save</button>
      </div>

      </div>
      </div>
      </div>



<script>

$(document).ready(function(){
  fetch_research();
});

function fetch_research(){
  $.ajax({
    url: "{{ route('fetch_research.list') }}",
    type: "GET",
    success: function(response){
      $('#second_part').html(response);
      $("#researchDatatable").DataTable();
    }
  });
}

function add_new_research(){
  var formData = new FormData();
        formData.append('research_head', $('#research_head').val());
        formData.append('journal_name', $('#journal_name').val());
        formData.append('publication_date', $('#publication_date').val());
        formData.append('extra_info', $('#extra_info').val());
        formData.append('pdf_file', $('#pdf_file')[0].files[0]);
        formData.append('head_image', $('#head_image')[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: "{{ route('add_research.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response.success);
                $('#researchForm')[0].reset();
                $('#add_research_info_modal').modal('hide');
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    alert(value[0]); // Show validation errors
                });
            }
        });
}
function edit_resech_info(id){
  $.ajax({
        url: "/edit_research/edit/" + id, 
        type: "GET",
        success: function(response) {
            $("#edit_reasearch_info_body").html(response);
            
        },
        error: function(xhr) {
            console.error("Error loading team member info:", xhr.responseText);
        }
    });
}

function update_research(){
  var id = $('#e_id').val();
  var formData = new FormData();
        formData.append('research_head', $('#research_head').val());
        formData.append('journal_name', $('#journal_name').val());
        formData.append('publication_date', $('#publication_date').val());
        formData.append('extra_info', $('#extra_info').val());
        formData.append('pdf_file', $('#pdf_file')[0].files[0]);
        formData.append('head_image', $('#head_image')[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
          url: "{{ route('update_research.update', ':id') }}".replace(':id', id),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response.success);
                $('#researchForm')[0].reset();
                $('#edit_research_info_modal').modal('hide');
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    alert(value[0]); // Show validation errors
                });
            }
        });
      }


 </script>
