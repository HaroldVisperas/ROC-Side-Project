<?php

namespace App\Http\Controllers\Mockup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use App\Models\Invitation;
use App\Models\Employee;

class MockupDashboardController extends Controller
{
    public function create()
    {
        $latestAnnouncements = Announcement::orderBy('updated_at', 'desc')->first();
        $latestAnnouncements = $latestAnnouncements ? collect([$latestAnnouncements]) : collect([]);

        return view('mockup.individual.mockup-dashboard', compact('latestAnnouncements'));
    }

    public function store_company(Request $request)
    {
        $request->validate([
            'affiliation' => 'required|string|max:255',
        ]);

        $user = User::find($request->user_id);
        $user->role = "ceo";
        $user->save();

        $employee = new Employee();
        $employee->email = $user->email;
        $employee->firstname = $user->firstname;
        $employee->middlename = $user->middlename;
        $employee->lastname = $user->lastname;
        $employee->phone_num = $user->phone_num;
        $employee->affiliation = $request->affiliation;
        $employee->role = $user->role;
        $employee->timezone = $user->timezone;
        $employee->save();

        return redirect()->route('mockup.dashboard.create')->with('success', 'Company created successfully');
    }

    public function create_recv_invitations()//possible na if ever pwede naman lumabas nalang sa dashboard kaysa may sarili siyang page
    {
        $invitations = Invitation::where('email', auth()->user()->email)->orderBy('created_at', 'desc')->get();
        return view('mockup.individual.mockup-invitations', compact('invitations'));
    }

    public function update_recv_invitation(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->role = $request->role;
        $user->save();

        $employee = new Employee();
        $employee->email = $user->email;
        $employee->employee_id = $request->employee_id;
        $employee->firstname = $user->firstname;
        $employee->middlename = $user->middlename;
        $employee->lastname = $user->lastname;
        $employee->phone_num = $user->phone_num;
        $employee->affiliation = $request->affiliation;
        $employee->role = $user->role;
        $employee->timezone = $user->timezone;
        $employee->save();

        $invitation = Invitation::where('email', $request->email)->first();
        $invitation->delete();

        return redirect()->route('mockup.dashboard.create')->with('success', 'Invitation accepted successfully');
    }

    public function delete_recv_invitation(Request $request)
    {
        $invitation = Invitation::where('email', $request->email)->first();
        $invitation->delete();

        return redirect()->route('mockup.invitations.create')->with('success', 'Invitation declined successfully');
    }
}