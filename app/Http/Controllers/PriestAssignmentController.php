<?php

namespace App\Http\Controllers;

use App\Models\PriestAssignment;
use App\Models\Priest;
use Illuminate\Http\Request;

class PriestAssignmentController extends Controller
{
    public function index()
    {
        $assignments = PriestAssignment::with('priest')->latest()->paginate(10);
        return view('admin.record.clergyRecord.priestassignmentRecord', compact('assignments'));
    }

    public function create()
    {
        $priests = Priest::all();
        return view('admin.create_record.priestassignmentCreate', compact('priests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'priest_id' => 'required|exists:priests,priest_id',
            'assignment_type' => 'required|string',
            'assignment_title' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
             'end_date' => 'nullable|date',
            'status' => 'required|string',
            'assigned_by' => 'required|string',
             'remarks' => 'nullable|string',
        ]);
       
        PriestAssignment::create($request->all());

        return redirect()->route('priests_assignments.index')->with('success', 'Assignment created successfully.');
    }

    public function show($id)
    {
        $assignment = PriestAssignment::with('priest')->findOrFail($id);
        return view('priests_assignments.show', compact('assignment'));
    }

    public function edit($id)
    {
        $assignment = PriestAssignment::findOrFail($id);
        $priests = Priest::all();
        return view('priests_assignments.edit', compact('assignment', 'priests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
         'priest_id' => 'required|exists:priests,priest_id',
            'assignment_type' => 'required|string',
            'assignment_title' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
             'end_date' => 'nullable|date',
            'status' => 'required|string',
            'assigned_by' => 'required|string',
             'remarks' => 'nullable|string',
        ]);

        $assignment = PriestAssignment::findOrFail($id);
        $assignment->update($request->all());

        return redirect()->route('priests_assignments.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy($id)
    {
        $assignment = PriestAssignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('priests_assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
