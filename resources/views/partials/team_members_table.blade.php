
<table id="teamMembersTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Experience (Years)</th>
            <th>Education</th>
            <th>Description</th>
            <th>Notable Cases</th>
            <th>Profile Picture</th>
            <th>Action</th>
        </tr>
    </thead>

<tbody>
    @if(isset($teamMembers) && $teamMembers->count() > 0)
        @foreach($teamMembers as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->designation }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->experience_years }}</td>
                <td>{{ $member->education }}</td>
                <td>{{ $member->description }}</td>
                <td>{{ $member->notable_cases }}</td>
                <td>
                    @if($member->profile_picture)
                        <img src="{{ asset($member->profile_picture) }}" width="50" height="50" class="rounded-circle">
                    @else
                        No Image
                    @endif
                </td>

                <td>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $member->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="9">No team members found.</td>
        </tr>
    @endif
</tbody>
</table>

