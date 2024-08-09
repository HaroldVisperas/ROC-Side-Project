<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Employee;

class BrandTicketController extends Controller
{
    public function create(Request $request)
    {
        $tickets = Ticket::where('company', $request->session()->get('company'))
            ->where('brand', $request->session()->get('brand'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('brand.brand-ticket', compact('tickets'));
    }

    public function create_ticket(Request $request)
    {
        $employee = Employee::where('email', auth()->user()->email)->first();

        if ($employee->employee_id === null) {
            $employee->employee_id = "0";
        }

        return view('brand.brand-create-ticket', compact('employee'));
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->company = $request->session()->get('company');
        $ticket->brand = $request->session()->get('brand');
        $ticket->employee_id = $request->employee_id;
        $ticket->first_name = $request->first_name;
        $ticket->middle_name = $request->middle_name;
        $ticket->last_name = $request->last_name;
        $ticket->title = $request->title;
        $ticket->work_email = $request->work_email;
        $ticket->status = $request->status;
        $ticket->message = $request->message;
        $ticket->save();

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function view(Request $request)
    {
        $ticket = Ticket::where('id', $request->ticket_id)->first();

        return view('brand.brand-view-ticket', compact('ticket'));
    }
}