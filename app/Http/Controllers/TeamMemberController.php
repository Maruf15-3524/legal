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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        return response()->json(['message' => 'Team Member Added Successfully']);
    }
}







