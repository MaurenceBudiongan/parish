<?php

namespace App\Http\Controllers;

use App\Models\ConfirmationRecord;
use Illuminate\Http\Request;

class ConfirmationRecordController extends Controller
{
    public function index()
    {
        $records = ConfirmationRecord::latest()->paginate(10);
        return view('admin.record.memberRecord.confirmationRecord', compact('records'));
    }

    public function create()
    {
        return view('admin.create_record.confirmationCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'sponsor' => 'required',
            'confirmation_date' => 'required|date',
        ]);

        ConfirmationRecord::create($request->all());

        return redirect()->route('confirmation.index')->with('success', 'Record created successfully.');
    }

    public function edit(ConfirmationRecord $confirmation)
    {
        return view('admin.edit_record.confirmationEdit', compact('confirmation'));
    }
     
    public function update(Request $request, ConfirmationRecord $confirmation)
    {
        $request->validate([
            'event' => 'required',
            'sponsor' => 'required',
            'confirmation_date' => 'required|date',
        ]);

        $confirmation->update($request->all());

        return redirect()->route('confirmation.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(ConfirmationRecord $confirmation)
    {
        $confirmation->delete();
        return back()->with('success', 'Record deleted successfully.');
    }
    
}
