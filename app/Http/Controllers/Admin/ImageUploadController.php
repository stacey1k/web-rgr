<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048', // макс 2 МБ
        ]);

        $path = $request->file('file')->store('pages', 'public');

        return response()->json([
            'location' => asset('storage/' . $path)
        ]);
    }
}