<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Brands.create');
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
    public function show(Brand $brand)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, $id)
    {
        //
    }
}
