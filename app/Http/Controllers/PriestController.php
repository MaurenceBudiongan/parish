<?php
namespace App\Http\Controllers;

use App\Models\Priest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriestController extends Controller
{
    public function index()
    {
        $priests = Priest::all();
        return view('priests.index', compact('priests'));
    }

    public function create()
    {
        return view('priests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|email|unique:priests,email',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'ordination_date' => 'required|date',
            'assigned_parish' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,Retired,On Leave'
        ]);

        $validated['priest_id'] = uniqid();

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('priests', 'public');
        }

        Priest::create($validated);

        return redirect()->route('priests.index')->with('success', 'Priest added successfully.');
    }

    public function edit(Priest $priest)
    {
        return view('priests.edit', compact('priest'));
    }

    public function update(Request $request, Priest $priest)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|email|unique:priests,email,' . $priest->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'ordination_date' => 'required|date',
            'assigned_parish' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'status' => 'required|in:Active,Retired,On Leave',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
          $validated['priest_id'] = uniqid();
        // Handle profile photo update
        if ($request->hasFile('profile_photo')) {
            // Delete old photo
            if ($priest->profile_photo && Storage::disk('public')->exists($priest->profile_photo)) {
                Storage::disk('public')->delete($priest->profile_photo);
            }
            $validated['profile_photo'] = $request->file('profile_photo')->store('priests', 'public');
        }

        $priest->update($validated);

        return redirect()->route('priests.index')->with('success', 'Priest updated successfully.');
    }

    public function destroy(Priest $priest)
    {
        // Delete profile photo if it exists
        if ($priest->profile_photo && Storage::disk('public')->exists($priest->profile_photo)) {
            Storage::disk('public')->delete($priest->profile_photo);
        }

        $priest->delete();

        return redirect()->route('priests.index')->with('success', 'Priest deleted successfully.');
    }
    public function showLoginForm()
{
    return view('priests.login');
}

public function login(Request $request)
{
    $request->validate([
        'priest_id' => 'required',
        'credentials' => 'required', // Expected format: lastname,firstname
    ]);

    $priest = Priest::where('priest_id', $request->priest_id)->first();

    if ($priest) {
        $inputName = strtolower(str_replace(' ', '', $request->credentials));
        $dbName = strtolower($priest->last_name . ',' . $priest->first_name);

        if ($inputName === $dbName) {
            return view('priests.dashboard', ['priest' => $priest]);
        }
    }

    return redirect()->back()->with('error', 'Invalid priest ID or name format.');
}
}
