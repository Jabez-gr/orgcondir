<?php

namespace App\Http\Controllers;

use App\Models\industries;
use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = industries::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $industries = $query->paginate(10);

        return view('industries.index', compact('industries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:industries,name',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        industries::create($request->all());

        return redirect()->route('industries.index')->with('success', 'Industry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(industries $industries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(industries $industries)
    {
        $industries = industries::findOrFail($industries->id);
        return view('industries.edit', compact('industries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, industries $industries)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:industries,name,' . $industries->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $industries->update($request->all());

        return redirect()->route('industries.index')->with('success', 'Industry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(industries $industries)
    {
        $industries = industries::findOrFail($industries->id);
        $industries->delete();
        return redirect()->route('industries.index')->with('success', 'Industry deleted successfully.');
    }
}
