<?php

namespace App\Http\Controllers;

use App\Models\Baptismal;
use Illuminate\Http\Request;

class BaptismalController extends Controller
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
        return view('admin.baptismal.create');
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
    public function show(Baptismal $baptismal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Baptismal $baptismal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Baptismal $baptismal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baptismal $baptismal)
    {
        //
    }
}
