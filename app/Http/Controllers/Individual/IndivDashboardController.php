<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\User;
use App\Models\Employee;

class IndivDashboardController extends Controller
{
    public function create()
    {
        $invitations = Invitation::where('email', auth()->user()->email)->orderBy('created_at', 'desc')->get();
        return view('individual.indiv-dashboard', compact('invitations'));
    }

    public function update_invitation(Request $request)
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
        $employee->affiliation_secondary = $request->affiliation_secondary;
        $employee->role = $user->role;
        $employee->timezone = $user->timezone;
        $employee->save();

        $invitation = Invitation::where('email', $request->email)->first();
        $invitation->delete();

        return redirect()->route('individual.dashboard.create')->with('success', 'Invitation accepted successfully');
    }

    public function delete_invitation(Request $request)
    {
        $invitation = Invitation::where('email', $request->email)->first();
        $invitation->delete();

        return redirect()->route('individual.dashboard.create')->with('success', 'Invitation declined successfully');
    }
}