<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'designation', 'email', 'phone', 'experience_years',
        'education', 'description', 'notable_cases', 'profile_picture','fb_url','linkedin_url','twitter_url'
    ];
}

