<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        $file = $request->file('upload');
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, $allowedExtensions)) {
            return response()->json(['error' => 'Invalid file type'], 400);
        }

        // Sanitize and make unique filename
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());

        // Move file to public/uploads
        $file->move(public_path('uploads'), $filename);

        $url = asset('uploads/' . $filename);

        // Return JSON with image URL for CKEditor 5
        return response()->json(['default' => $url]);
    }
}
