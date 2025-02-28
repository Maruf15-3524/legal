<div class="row">
    <div class="col-md-4">
        <label class="form-label"><b>Research Head</b> <span style="color:red">*</span></label>
        <input type="text" name="research_head" id="research_head" class="form-control" value="{{ $research->research_head }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label"><b>Journal Name</b></label>
        <input type="text" name="journal_name" id="journal_name" class="form-control" value="{{ $research->journal_name }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label"><b>Publication Date</b></label>
        <input type="date" name="publication_date" id="publication_date" class="form-control" value="{{ $research->publication_date }}" required>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <label class="form-label"><b>Description</b></label>
        <input type="text" name="extra_info" id="extra_info" class="form-control" value="{{ $research->extra_info }}">
    </div>
    <div class="col-md-4">
        <label class="form-label"><b>Upload PDF</b> <span style="color:red">*</span></label>
        @if($research->pdf_file)
            <a href="{{ asset('storage/' . $research->pdf_file) }}" target="_blank">View Current PDF</a>
        @endif
        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf">
    </div>
    <div class="col-md-4">
        <label class="form-label"><b>Upload Head Image</b> <span style="color:red">*</span></label>
        @if($research->uplad_head_image_lo)
            <img id="image_preview" src="{{ asset('storage/' . $research->uplad_head_image_lo) }}" alt="Current Head Image" style="max-width: 100px; max-height: 100px;">
            <p id="image_filename">{{ basename($research->uplad_head_image_lo) }}</p>
        @else
            <img id="image_preview" src="" alt="Image Preview" style="max-width: 100px; max-height: 100px; display: none;">
            <p id="image_filename" style="display: none;"></p>
        @endif
        <input type="file" name="head_image" id="head_image" class="form-control" accept="image/*" onchange="updateImagePreview()">
    </div>
</div>


<script>
    function updateImagePreview() {
        const fileInput = document.getElementById('head_image');
        const file = fileInput.files[0];
        const imagePreview = document.getElementById('image_preview');
        const imageFilename = document.getElementById('image_filename');

        if (file) {
            // Display the image preview
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);

            // Display the filename
            imageFilename.textContent = file.name;
            imageFilename.style.display = 'block';
        } else {
            // Hide the image preview and filename if no file is selected
            imagePreview.style.display = 'none';
            imageFilename.style.display = 'none';
        }
    }
</script>
