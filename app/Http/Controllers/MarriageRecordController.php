<?php
namespace App\Http\Controllers;
use App\Models\MarriageRecord;
use Illuminate\Http\Request;

class MarriageRecordController extends Controller
{
    public function index()
    {
        $marriagerecords = MarriageRecord::latest()->paginate(10);
        return view('admin.record.memberRecord.marriageRecord', compact('marriagerecords'));
    }

    public function create()
    {
        return view('admin.create_record.marriageCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bride' => 'required|string|max:255',
            'groom' => 'required|string|max:255',
            'officiant' => 'required|string|max:255',
            'marriage_date' => 'required|date',
        ]);

        MarriageRecord::create($request->all());

        return redirect()->back()->with('success', 'Saved record Successfully');
    }

    public function edit(MarriageRecord $marriageRecord)
    {
        return view('admin.edit_record.marriageEdit', compact('marriageRecord'));
    }

    public function update(Request $request, MarriageRecord $marriageRecord)
    {
        $request->validate([
            'bride' => 'required|string|max:255',
            'groom' => 'required|string|max:255',
            'officiant' => 'required|string|max:255',
            'marriage_date' => 'required|date',
        ]);

        $marriageRecord->update($request->all());

        return redirect()->route('marriage.index')->with('success', 'Marriage record updated!');
    }

    public function destroy(MarriageRecord $marriageRecord)
    {
      
        $marriageRecord->delete();
        return back()->with('success', 'Marriage record deleted!');
    }
}
