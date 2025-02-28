<div class="row">
  <input type="hidden" name="" id="e_id" value="{{ $teamMember->id }}">
        <!-- Full Name -->
        <div class="col-md-4 mb-3">
            <label for="name" class="form-label"><strong>Full Name</strong> <span style="color:red">*</span></label>
            <input type="text" class="form-control" id="e_name" name="name" value="{{ $teamMember->name }}" required>
        </div>

        <!-- Role/Designation -->
        <div class="col-md-4 mb-3">
            <label for="role" class="form-label"><strong>Designation</strong> <span style="color:red">*</span></label>
            <input type="text" class="form-control" id="e_role" name="designation" value="{{ $teamMember->designation }}" required>
        </div>

        <!-- Email -->
        <div class="col-md-4 mb-3">
            <label for="email" class="form-label"><strong>Email Address</strong></label>
            <input type="email" class="form-control" id="e_email" name="email" value="{{ $teamMember->email }}" required>
        </div>
    </div>

    <div class="row">
        <!-- Phone Number -->
        <div class="col-md-4 mb-3">
            <label for="phone" class="form-label"><strong>Phone Number</strong></label>
            <input type="text" class="form-control" id="e_phone" name="phone" value="{{ $teamMember->phone }}" required>
        </div>

        <!-- Experience (Years) -->
        <div class="col-md-4 mb-3">
            <label for="experience_years" class="form-label"><strong>Experiences</strong></label>
            <textarea class="form-control" id="e_experience_years" name="experience_years" rows="1"   required>{{ $teamMember->experience_years }}</textarea>
        </div>

        <!-- Education Background -->
        <div class="col-md-4 mb-3">
            <label for="education" class="form-label"><strong>Educational Background</strong></label>
            <textarea class="form-control" id="e_education" name="education" rows="1" required>{{ $teamMember->education }}</textarea>
        </div>
    </div>
    <div class="row">
            <!-- Fb url -->
            <div class="col-md-4 mb-3">
              <label for="phone" class="form-label"><strong>Facebook Url</strong></label>
              <input type="text" class="form-control" id="e_fb_url" placeholder="Enter Facebook Url" value="{{ $teamMember->fb_url}}">
            </div>

            <!-- linkedin url -->
            <div class="col-md-4 mb-3">
              <label for="experience_years" class="form-label"><strong>Linkedin Url</strong></label>
              <input type="text" class="form-control" id="e_linkedin_url" placeholder="Enter Linkedin Url" value="{{ $teamMember->linkedin_url }}">
            </div>

            <!-- twitter -->
            <div class="col-md-4 mb-3">
              <label for="education" class="form-label"> <strong>Twitter Url</strong></label>
              <input type="text" class="form-control" id="e_twitter_url" rows="1" placeholder="Enter Twitter Url" value="{{ $teamMember->twitter_url}}"></input>
            </div>
          </div>

    <div class="row">
        <!-- Brief Description -->
        <div class="col-md-6 mb-3">
            <label for="description" class="form-label"><strong>Description</strong></label>
            <textarea class="form-control" id="e_description" name="description" rows="2" required>{{ $teamMember->description }}</textarea>
        </div>

        <!-- Experience & Notable Cases -->
        <div class="col-md-6 mb-3">
            <label for="notable_cases" class="form-label"><strong>Experience</strong></label>
            <textarea class="form-control" id="e_notable_cases" name="notable_cases" rows="2" required>{{ $teamMember->notable_cases }}</textarea>
        </div>
    </div>

    <div class="row">
        <!-- Profile Picture Upload -->
        <div class="col-md-6 mb-3">
            <label for="profile_picture" class="form-label"><strong>Profile Picture</strong></label>
            <input type="file" class="form-control" id="e_profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
        </div>

        <!-- Profile Picture Preview -->
        <div class="col-md-6 text-center">
        <img id="image_preview" src="{{ asset($teamMember->profile_picture) }}" 
     alt="Profile Picture Preview"
     style="max-width: 100px; border-radius: 10px; margin-top: 10px;">

        </div>
    </div>