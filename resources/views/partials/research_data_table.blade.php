<table id="researchDatatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Research Head</th>
            <!-- <th>Journal Name</th> -->
            <th>Description</th>
            <th>Upload Head Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @if(isset($researches) && $researches->count() > 0)
        @foreach($researches as $research)
        <tr>
            <td>{{ $research->research_head }}</td>
            <td>{!! $research->extra_info !!}</td>
            <td>
                @if($research->uplad_head_image_lo)
                <img src="{{ asset($research->uplad_head_image_lo) }}" width="50" height="50" class="rounded-circle">
                @else
                No Image
                @endif
            </td>
            <td>
                <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#edit_research_info_modal" data-id="{{ $research->id }}"
                    onclick="edit_resech_info({{$research->id}})"> <i class="fa fa-edit">

                    </i></button>

                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $research->id }}"> <i class="fa fa-remove"></i></button>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="">No data found.</td>
        </tr>
        @endif
    </tbody>
</table>