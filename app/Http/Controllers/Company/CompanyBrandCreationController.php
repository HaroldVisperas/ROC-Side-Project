<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Employee;

class CompanyBrandCreationController extends Controller
{
    public function create()
    {
        return view('company.company-brandcreation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'facebook_link' => 'nullable',
            'x_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'instagram_link' => 'nullable',
            'youtube_link' => 'nullable',
            'tiktok_link' => 'nullable',
        ]);

        $employee = Employee::where('email', $request->user_email)->first();

        $brand = new Brand();
        $brand->company = $employee->affiliation;
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->facebook_link) {
            $facebookLink = $request->facebook_link;
            if (strpos($facebookLink, 'https://www.facebook.com/') !== 0) {
                $facebookLink = 'https://www.facebook.com/' . ltrim($facebookLink, '/');
            }
            $brand->facebook_link = $facebookLink;
        }
        if ($request->x_link) {
            $xLink = $request->x_link;
            if (strpos($xLink, 'https://www.x.com/') !== 0) {
                $xLink = 'https://www.x.com/' . ltrim($xLink, '/');
            }
            $brand->x_link = $xLink;
        }
        if ($request->linkedin_link) {
            $linkedinLink = $request->linkedin_link;
            if (strpos($linkedinLink, 'https://www.linkedin.com/in/') !== 0) {
                $linkedinLink = 'https://www.linkedin.com/' . ltrim($linkedinLink, '/');
            }
            $brand->linkedin_link = $linkedinLink;
        }
        if ($request->instagram_link) {
            $instagramLink = $request->instagram_link;
            if (strpos($instagramLink, 'https://www.instagram.com/') !== 0) {
                $instagramLink = 'https://www.instagram.com/' . ltrim($instagramLink, '/');
            }
            $brand->instagram_link = $instagramLink;
        }
        if ($request->youtube_link) {
            $youtubeLink = $request->youtube_link;
            if (strpos($youtubeLink, 'https://www.youtube.com/@') !== 0) {
                $youtubeLink = 'https://www.youtube.com/@' . ltrim($youtubeLink, '/');
            }
            $brand->youtube_link = $youtubeLink;
        }
        if ($request->tiktok_link) {
            $tiktokLink = $request->tiktok_link;
            if (strpos($tiktokLink, 'https://www.tiktok.com/') !== 0) {
                $tiktokLink = 'https://www.tiktok.com/' . ltrim($tiktokLink, '/');
            }
            $brand->tiktok_link = $tiktokLink;
        }
        $brand->save();

        return redirect()->route('company.brands.create');
    }
}