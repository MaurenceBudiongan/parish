<?php

namespace App\Http\Controllers;

use App\Models\MassSchedule;
use Illuminate\Http\Request;

class MassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = MassSchedule::orderBy('date')->paginate(10);
        return view('admin.record.eventRecord.servicesschedulingRecord', compact('schedules'));
    }
        public function UserIndex()
    {
        $schedules = MassSchedule::all();
        return view('user.document_requests.mass&servicesschedule', compact('schedules'));
    }
    public function create()
    {
        return view('admin.create_record.mass&serviceCreate');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',  
            'service_type' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'status' => 'required',
            'notes' => 'required'
        ]);
    
        MassSchedule::create($request->all());
    
        return redirect()->back()->with('success', 'Record Added Successfully');
    }
    
    public function edit(MassSchedule $mass_schedule)
    {
        return view('mass_schedules.edit', compact('mass_schedule'));
    }
    
    public function update(Request $request, MassSchedule $mass_schedule)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',  
            'service_type' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
            'status' => 'required',
            'notes' => 'required'
        ]);
    
        $mass_schedule->update($request->all());
    
        return redirect()->route('mass_schedules.index')->with('success', 'Schedule updated successfully.');
    }
    
    public function destroy(MassSchedule $mass_schedule)
    {
        $mass_schedule->delete();
        return redirect()->back()->with('success', 'Schedule deleted');
    }
}
