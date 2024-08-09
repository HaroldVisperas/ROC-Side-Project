<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Task;
use App\Models\Employee;
use App\Models\Subscription;

class CompanyDashboardController extends Controller
{
    public function create(Request $request)
    {
        $employee = Employee::where('email', auth()->user()->email)->first();

        if(!$request->session()->has('company')) {
            $request->session()->put('company', $employee->affiliation);
        }
        if($request->session()->has('brand')) {
            $request->session()->forget('brand');
        }

        $latestAnnouncements = Announcement::orderBy('updated_at', 'desc')->first();
        $latestAnnouncements = $latestAnnouncements ? collect([$latestAnnouncements]) : collect([]);

        $recenttasks = Task::orderBy('updated_at', 'desc')->limit(2)->get();

        $recentsubscriptions = Subscription::where('company', $employee->affiliation)->orderBy('created_at', 'desc')->limit(2)->get();

        return view('company.company-dashboard', compact('latestAnnouncements', 'recenttasks', 'recentsubscriptions'));
    }
}