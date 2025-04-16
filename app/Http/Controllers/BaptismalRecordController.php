<?php

namespace App\Http\Controllers;

use App\Models\BaptismalRecord;
use Illuminate\Http\Request;

class BaptismalRecordController extends Controller
{
    // View List
    public function index()
    {
        $records = BaptismalRecord::latest()->paginate(10);
        return view('admin.record.memberRecord.baptistRecord', compact('records'));
    }

    // Show Create Form
    public function create()
    {
        return view('admin.create_record.baptistCreate');
    }

    // Store Record
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'baptism_date' => 'required|date',
        ]);

        BaptismalRecord::create($request->all());

        return redirect()->back()->with('success', 'Record Added Successfully');
    }

    // Show Edit Form
    public function edit($id)
    {
        $record = BaptismalRecord::findOrFail($id);
        return view('admin.create_record.baptistCreate', compact('record'));
    }

    // Update Record
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'baptism_date' => 'required|date',
        ]);

        $record = BaptismalRecord::findOrFail($id);
        $record->update($request->all());

        return redirect()->route('admin.baptismal.index')->with('success', 'Record Updated Successfully!');
    }

    // Delete Record
    public function destroy($id)
    {
        $record = BaptismalRecord::findOrFail($id);
        $record->delete();

        return back()->with('success', 'Deleted');

    }
}
