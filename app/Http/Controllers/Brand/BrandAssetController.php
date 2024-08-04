<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class BrandAssetController extends Controller
{
    public function create()
    {
        return view('brand.brand-assets');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_brand' => 'required',
            'image_title' => 'required|max:255|string',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/uploads/images/'), $imageName);

            // Save the data to the database
            $image = new Image();
            $image->brand = $request->image_brand;
            $image->title = $request->image_title;
            $image->path = 'assets/uploads/images/' . $imageName;
            $image->save();

            return back()->with('success', 'Image uploaded successfully.');
        }

        return back()->with('error', 'Image upload failed.');
    }
}