<?php

namespace App\Http\Controllers;

use App\Models\Marriage;
use Illuminate\Http\Request;

class MarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.marriage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Marriage $marriage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marriage $marriage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marriage $marriage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marriage $marriage)
    {
        //
    }
}
