<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class CompanyAnnouncementController extends Controller
{
    public function create()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        return view('company.company-announcement', compact('announcements'));
    }   
}