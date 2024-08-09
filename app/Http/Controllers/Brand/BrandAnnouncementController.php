<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class BrandAnnouncementController extends Controller
{
    public function create()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        return view('brand.brand-announcement', compact('announcements'));
    }   
}