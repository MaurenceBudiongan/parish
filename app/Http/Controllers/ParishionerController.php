<?php
namespace App\Http\Controllers;
use App\Models\Parishioner;
use Illuminate\Http\Request;

class ParishionerController extends Controller
{
    public function index(Request $request)
    {
        $parishioners = Parishioner::all();
        if (!$request->ajax()) {
            // This will stop direct access from browser
            abort(403, 'Access denied');
        }
        return view('parishioner.index', compact('parishioners'));
    }

    public function create()
    {
        return view('parishioner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'dateofbirth' => 'required|date',
            'gender' => 'required',
            'contactnumber' => 'required|max:11',
            'civil_status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'baptized' => 'required',
            'baptism_date' => 'nullable|date',
            'baptism_church' => 'nullable|string',
            'confirmed' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('parishioner_images', 'public');
        }
    
        Parishioner::create($validated);
    
        return redirect()->route('parishioners.index')->with('success', 'Registration saved!');
    }
    

    public function edit(Parishioner $parishioner)
    {
        return view('parishioner.edit', compact('parishioner'));
    }

    public function update(Request $request, Parishioner $parishioner)
    {
        $parishioner->update($request->all());
        return redirect()->route('parishioners.index')->with('success', 'Updated successfully!');
    }

    public function destroy(Parishioner $parishioner)
    {
        $parishioner->delete();
        return back()->with('success', 'Deleted!');
    }
}
