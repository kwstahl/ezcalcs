<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('UnitCreator');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('UnitCreator');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit_inputs_to_create_model = $request->all();
        $id = $request->id;
        $unit_class = $request->unit_class;
        $base_unit = $request->base_unit;
        $symbol = $request->symbol;
        $conversion_to_base = $request->conversion_to_base;
        $description = $request->description;

        $model = Unit::updateOrCreate(
        [
            'id' => $id,
            'unit_class' => $unit_class,
            'base_unit' => $base_unit,
            'symbol' => $symbol,
            'conversion_to_base' => $conversion_to_base,
            'description' => $description,
        ]
        );
        
        return view('UnitCreator');
        
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
