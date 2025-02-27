<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:team_members,email',
            'phone' => 'required|string',
            'experience_years' => 'required|integer',
            'education' => 'required|string',
            'description' => 'required|string',
            'notable_cases' => 'required|string',
            // 'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle Profile Picture Upload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/team_members'), $imageName);
            $profilePicturePath = 'uploads/team_members/' . $imageName;
        } else {
            $profilePicturePath = null;
        }

        // Save Data to Database
        TeamMember::create([
            'name' => $request->name,
            'designation' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience_years' => $request->experience_years,
            'education' => $request->education,
            'description' => $request->description,
            'notable_cases' => $request->notable_cases,
            'profile_picture' => $profilePicturePath,
        ]);

        return response()->json(['success' => true,'message' => 'Team Member Added Successfully']);
    }

    public function view_data()
    {
        $teamMembers = TeamMember::all(); // Fetch team members
        return view('partials.team_members_table', compact('teamMembers'));
    }

    public function delete($id)
    {
        $teamMember = TeamMember::find($id);
        if ($teamMember) {
            $teamMember->delete();
            return response()->json(['success' => true, 'message' => 'Team Member Deleted Successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Team Member Not Found']);
        }
    }

    public function team_edit($id)
    {
        $teamMember = TeamMember::find($id);
        return view('partials.edit_teammember_info', compact('teamMember'));
    }
    
    public function team_update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:team_members,email,' . $id, // Exclude current record from unique check
            'phone' => 'required|string',
            'experience_years' => 'required|integer',
            'education' => 'required|string',
            'description' => 'required|string',
            'notable_cases' => 'required|string',
            // 'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional for updates
        ]);
    
        // Find the team member by ID
        $teamMember = TeamMember::findOrFail($id);
    
        // Handle Profile Picture Upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($teamMember->profile_picture) {
                $oldImagePath = public_path($teamMember->profile_picture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Remove old image
                }
            }
    
            // Upload new profile picture
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/team_members'), $imageName);
            $profilePicturePath = 'uploads/team_members/' . $imageName;
        } else {
            // Keep the old profile picture if no new one is uploaded
            $profilePicturePath = $teamMember->profile_picture;
        }
    
        // Update the team member's information
        $teamMember->update([
            'name' => $request->name,
            'designation' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience_years' => $request->experience_years,
            'education' => $request->education,
            'description' => $request->description,
            'notable_cases' => $request->notable_cases,
            'profile_picture' => $profilePicturePath,
        ]);
    
        return response()->json(['success' => true, 'message' => 'Team Member updated successfully']);
    }
    

    public function team_delete($id)
{
    $teamMember = TeamMember::findOrFail($id);
    
    // Optionally, delete the profile picture from the server
    if ($teamMember->profile_picture) {
        $oldImagePath = public_path($teamMember->profile_picture);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath); // Remove old image
        }
    }
    
    // Delete the team member
    $teamMember->delete();

    return response()->json(['success' => true, 'message' => 'Team Member deleted successfully']);
}


}







