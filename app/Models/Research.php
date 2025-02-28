<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'research_head',
        'journal_name',
        'publication_date',
        'extra_info',
        'pdf_file',
        'uplad_head_image_lo'
    ];
}
