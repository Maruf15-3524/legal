<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;

class ResearchController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'research_head' => 'required|string',

        ]);

        // Handle PDF upload
        // if ($request->hasFile('pdf_file')) {
        //     $pdfFile = $request->file('pdf_file');
        //     $pdfFileName = time() . '_pdf.' . $pdfFile->getClientOriginalExtension();
        //     $pdfPath = $pdfFile->storeAs('uploads', $pdfFileName, 'public');
        // }

        if ($request->hasFile('head_image')) {
            $imageName = time() . '.' . $request->head_image->extension();
            $request->head_image->move(public_path('uploads/research'), $imageName);
            $imagePath = 'uploads/research/' . $imageName;
        } else {
            $imagePath = null;
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFile = time() . '.' . $request->pdf_file->extension();
            $request->pdf_file->move(public_path('uploads/research'), $pdfFile);
            $pdfPath = 'uploads/research/' . $pdfFile;
        } else {
            $pdfPath = null;
        }
        Research::create([
            'research_head' => $request->research_head,
            // 'journal_name' => $request->journal_name,
            // 'publication_date' => $request->publication_date,
            'extra_info' => $request->extra_info,
            'pdf_file' => $pdfPath ?? null,
            'uplad_head_image_lo' => $imagePath ?? null,
        ]);
        return response()->json(['success' => 'Research data saved successfully!']);
    }

    public function view_data()
    {
        $researches = Research::all();
        return view('partials.research_data_table', compact('researches'));
    }

    public function research_edit($id)
    {
        $research = Research::find($id);
        return view('partials.edit_reseach_from', compact('research'));
    }
}
