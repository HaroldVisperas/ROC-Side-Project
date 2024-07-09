<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class BrandTaskController extends Controller
{
    public function create()
    {
        $tasks = Task::all();
        return view('brand.brand-task', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'status' => 'todo',
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|string|in:todo,working,approval,done',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Task updated successfully!']);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully!']);
    }
}