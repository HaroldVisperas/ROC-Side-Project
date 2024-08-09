<?php

namespace App\Http\Controllers\Mockup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class MockupAdministratorController extends Controller
{
    public function create()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        return view('administrator.administrator-addannouncement', compact('announcements'));
    }

    public function store_announcement(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'link_text' => 'nullable',
            'link_url' => 'nullable',
        ]);

        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->link_text = $request->link_text;
        $announcement->link_url = $request->link_url;
        $announcement->save();

        return redirect()->route('administrator.create')->with('success', 'Announcement added successfully');
    }

    public function edit_announcement($id)
    {
        $announcement = Announcement::find($id);
        return view('administrator-editannouncement', compact('announcement'));
    }

    public function update_announcement(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'link_text' => 'nullable',
            'link_url' => 'nullable',
        ]);

        $announcement = Announcement::find($id);
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->link_text = $request->link_text;
        $announcement->link_url = $request->link_url;
        $announcement->save();

        return redirect()->route('administrator.create')->with('success', 'Announcement updated successfully');
    }

    public function delete_announcement($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();

        return redirect()->route('administrator.create')->with('success', 'Announcement deleted successfully');
    }
}