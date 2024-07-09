<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class CompanyDashboardController extends Controller
{
    public function create()
    {
        $latestAnnouncements = Announcement::orderBy('updated_at', 'desc')->first();
        $latestAnnouncements = $latestAnnouncements ? collect([$latestAnnouncements]) : collect([]);

        return view('company.company-dashboard', compact('latestAnnouncements'));
    }
}