<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Announcement;
use App\Models\Task;
use App\Models\Subscription;

class BrandDashboardController extends Controller
{
    public function create(Request $request)
    {
        $member = Employee::where('email', auth()->user()->email)->first();

        if(auth()->user()->role === 'member') {
            $request->session()->put('company', $member->affiliation);
            $request->session()->put('brand', $member->affiliation_secondary);
        }

        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        $latestAnnouncements = Announcement::orderBy('updated_at', 'desc')->first();
        $latestAnnouncements = $latestAnnouncements ? collect([$latestAnnouncements]) : collect([]);
        // $latestAnnouncements = collect([]);

        $recenttasks = Task::where('company', $company)->where('brand', $brand)->orderBy('updated_at', 'desc')->limit(2)->get();
        // $recenttasks = collect([]);

        $recentsubscriptions = Subscription::where('company', $company)->where('brand', $brand)->orderBy('created_at', 'desc')->first();
        
        return view('brand.brand-dashboard', compact('latestAnnouncements', 'recenttasks', 'recentsubscriptions'));
    }
}