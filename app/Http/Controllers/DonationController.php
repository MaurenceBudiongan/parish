<?php
namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Parishioner;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Access denied');
        }
        $donations = Donation::with('member')->latest()->paginate(10);
        return view('admin.record.financialRecord.donationRecord', compact('donations'));
    }

    public function create(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Access denied');
        }
        $members = Parishioner::all();
        return view('admin.create_record.donationCreate', compact('members'));
    }
        public function financialreport(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Access denied');
        }
        $members = Parishioner::all();
        return view('admin.record.Report&Analytics.financialReport', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:parishioners,id',
            'amount' => 'nullable|numeric',
            'donation_type' => 'required',
            'donation_date' => 'required|date',
            'payment_method' => 'nullable',
        ]);

        Donation::create($request->all());

        return redirect()->back()->with('success', 'Donation recorded successfully.');
    }

    public function edit(Donation $donation)
    {
        $members = Parishioner::all();
        return view('admin.record.financialRecord.donationRecord', compact('donation', 'members'));
    }

    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'member_id' => 'required|exists:parishioners,id',
            'amount' => 'nullable|numeric',
            'donation_type' => 'required|string',
            'donation_date' => 'required|date',
            'payment_method' => 'nullable|string',
        ]);

        $donation->update($request->all());

        return redirect()->back()->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect()->back()->with('success', 'Donation deleted.');
    }
    public function report()
    {
      
    $donations = Donation::with('member')->latest()->get();
    return view('admin.record.Report&Analytics.financialReport', compact('donations'));
}

}
