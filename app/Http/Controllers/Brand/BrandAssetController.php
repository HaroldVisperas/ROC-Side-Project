<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Image;

class BrandAssetController extends Controller
{
    public function create()
    {
        $colors = Color::where('brand', auth()->user()->email)->get();
        $images = Image::where('brand', auth()->user()->email)->get();
        return view('brand.brand-assets', compact('colors', 'images'));
    }

    public function store_color(Request $request)
    {
        $request->validate([
            'color_brand' => 'required',
            'color' => 'required',
        ]);

        // Convert hex color to RGB and HSL
        $hexColor = $request->color;
        $rgbColor = $this->hexToRgb($hexColor);
        $hslColor = $this->rgbToHsl($rgbColor);

        // Save the data to the database
        $color = new Color();
        $color->brand = $request->color_brand;
        $color->color = $hexColor;
        $color->rgb = json_encode($rgbColor);
        $color->hsl = json_encode($hslColor);
        $color->save();

        return back()->with('success', 'Color uploaded successfully.');
    }

    public function delete_color(Request $request)
    {
        $color = Color::find($request->color_id);
        $color->delete();
        return back()->with('success', 'Color deleted successfully.');
    }

    public function store_image(Request $request)
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

    public function delete_image(Request $request)
    {
        $image = Image::find($request->image_id);
        $image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }

    private function hexToRgb($hex)
    {
        $hex = str_replace('#', '', $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 4));
        $b = hexdec(substr($hex, 4, 6));
        return ['r' => $r, 'g' => $g, 'b' => $b];
    }

    private function rgbToHsl($rgb)
    {
        $r = $rgb['r'] / 255;
        $g = $rgb['g'] / 255;
        $b = $rgb['b'] / 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $h;
        $s;
        $l = ($max + $min) / 2;

        if ($max == $min) {
            $h = $s = 0; // achromatic
        } else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch ($max) {
                case $r:
                    $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                    break;
                case $g:
                    $h = ($b - $r) / $d + 2;
                    break;
                case $b:
                    $h = ($r - $g) / $d + 4;
                    break;
            }
            $h /= 6;
        }

        return ['h' => round($h * 360), 's' => round($s * 100), 'l' => round($l * 100)];
    }
}