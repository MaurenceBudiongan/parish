<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;

class DeathController extends Controller
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
        return view('admin.death.create');
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
    public function show(Death $death)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Death $death)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Death $death)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Death $death)
    {
        //
    }
}
