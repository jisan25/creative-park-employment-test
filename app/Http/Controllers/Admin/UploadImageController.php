<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Update the user's image field in the database
        $user = auth()->user();
        $user->image = $imageName;
        $user->save();

        return response()->json(['message' => 'Image uploaded successfully', 'image' => $user->image]);
    }
}
