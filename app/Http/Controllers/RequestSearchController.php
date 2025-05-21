<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\MarriageRequest;
use App\Models\DeathRequest;

class RequestSearchController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->input('term');

        $baptism = BaptismRequest::where(function ($query) use ($term) {
            $query->where('childName', 'LIKE', "%{$term}%")
                  ->orWhere('requester', 'LIKE', "%{$term}%");
        })->get();

        $confirmation = ConfirmationRequest::where(function ($query) use ($term) {
            $query->where('confirmedName', 'LIKE', "%{$term}%")
                  ->orWhere('requester', 'LIKE', "%{$term}%");
        })->get();

        $marriage = MarriageRequest::where(function ($query) use ($term) {
            $query->where('spouse1', 'LIKE', "%{$term}%")
                  ->orWhere('spouse2', 'LIKE', "%{$term}%")
                  ->orWhere('requester', 'LIKE', "%{$term}%");
        })->get();

        $death = DeathRequest::where(function ($query) use ($term) {
            $query->where('fullName', 'LIKE', "%{$term}%")
                  ->orWhere('requester', 'LIKE', "%{$term}%");
        })->get();

        return response()->json([
            'baptism' => $baptism,
            'confirmation' => $confirmation,
            'marriage' => $marriage,
            'death' => $death,
        ]);
    }
}
