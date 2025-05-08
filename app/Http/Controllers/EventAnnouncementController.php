<?php

namespace App\Http\Controllers;
use App\Models\EventAnnouncement;
use Illuminate\Http\Request;

class EventAnnouncementController extends Controller
{

    public function index()
    {
        $events = EventAnnouncement::latest()->paginate(10);
        return view('admin.record.eventRecord.eventannouncement', compact('events'));
    }
    
    public function create()
    {
        return view('admin.create_record.eventCreate');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'audience' => 'required',
            'status' => 'required',
            'announced_by' => 'required',
        ]);
    
        EventAnnouncement::create($validated);
    
        return redirect()->back()->with('success', 'Announcement Created');
    }
    
    public function edit(EventAnnouncement $event_announcement)
    {
        return view('event_announcements.edit', compact('event_announcement'));
    }
    
    public function update(Request $request, EventAnnouncement $event_announcement)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'audience' => 'required',
            'status' => 'required',
            'announced_by' => 'required',
        ]);
    
        $event_announcement->update($validated);
    
        return redirect()->route('event_announcements.index')->with('success', 'Announcement updated.');
    }
    
    public function destroy(EventAnnouncement $event_announcement)
    {
        $event_announcement->delete();
        return back()->with('success', 'Announcement deleted.');
    }
    
}
