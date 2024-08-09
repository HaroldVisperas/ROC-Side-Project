<?php

// BrandTaskController.php
namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Employee;
use App\Models\Ticket;

class BrandTaskController extends Controller
{
    public function create()
    {
        $tasks = Task::all();
        return view('brand.brand-task', compact('tasks'));
    }

    public function store(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $employee = Employee::where('email', auth()->user()->email)->first();

        if (!$employee->employee_id) {
            $employee->employee_id = "0";
        }

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $existing_task = Task::where('company', $company)
                ->where('brand', $brand)
                ->where('work_email', $employee->email)
                ->where('title', $request->title)
                ->where('status', 'todo')
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->first();

        if ($existing_task) {
            return redirect()->route('brand.tasks.create')->with('error', 'Task already exists.');
        }

        $task = Task::create([
            'company' => $company,
            'brand' => $brand,
            'employee_id' => $employee->employee_id,
            'first_name' => $employee->firstname,
            'middle_name' => $employee->middlename,
            'last_name' => $employee->lastname,
            'work_email' => $employee->email,
            'title' => $request->title,
            'status' => 'todo',
        ]);

        $ticket = Ticket::create([
            'company' => $company,
            'brand' => $brand,
            'employee_id' => $employee->employee_id,
            'first_name' => $employee->firstname,
            'middle_name' => $employee->middlename,
            'last_name' => $employee->lastname,
            'work_email' => $employee->email,
            'title' => 'TASK CREATION: ' . $request->title,
            'status' => 'Active',
            'message' => 'Added a new task for ' . $brand . ':   ' . $request->title . '.',
        ]);

        return redirect()->route('brand.tasks.create')->with('success', 'Task successfully created.');
    }

    public function update(Request $request, Task $task)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $employee = Employee::where('email', auth()->user()->email)->first();

        if (!$employee->employee_id) {
            $employee->employee_id = "0";
        }

        $request->validate([
            'status' => 'required|string|in:todo,working,approval,done',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        $ticket = Ticket::create([
            'company' => $company,
            'brand' => $brand,
            'employee_id' => $employee->employee_id,
            'first_name' => $employee->firstname,
            'middle_name' => $employee->middlename,
            'last_name' => $employee->lastname,
            'work_email' => $employee->email,
            'title' => 'TASK UPDATE: ' . $task->title,
            'status' => 'Active',
            'message' => 'Updated task status to ' . strtoupper($request->status) . ':   ' . $task->title . '.',
        ]);

        return redirect()->route('brand.tasks.create')->with('success', 'Task successfully updated.');
    }

    public function delete(Request $request, Task $task)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $employee = Employee::where('email', auth()->user()->email)->first();

        if (!$employee->employee_id) {
            $employee->employee_id = "0";
        }

        $ticket = Ticket::create([
            'company' => $company,
            'brand' => $brand,
            'employee_id' => $employee->employee_id,
            'first_name' => $employee->firstname,
            'middle_name' => $employee->middlename,
            'last_name' => $employee->lastname,
            'work_email' => $employee->email,
            'title' => 'TASK DELETION: ' . $task->title,
            'status' => 'Closed',
            'message' => 'Deleted a task:   ' . $task->title . '.',
        ]);

        $task->delete();
        return response()->json(['success' => true, 'message' => 'Task deleted successfully!']);
    }
}
