<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalcPage;
use Illuminate\Support\Arr;

class CalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CalcPageView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PageCreator');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $jsonData = json_encode($data['data']);
        $id = $request->id;
        $formula_name = $request->formula_name;
        $formula_description = $request->formula_description;
        $formula_sympi = $request->formula_sympi;
        
        $model = CalcPage::updateOrCreate(
        [
            'variables_json' => $jsonData,
            'id' => $id,
            'formula_name' => $formula_name,
            'formula_description' => $formula_description,
            'formula_sympi' => $formula_sympi,
        ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show($id)
    {

        /** If $id finds an existing id in database.sqlite, then pass in data and display
         * CalcPageView. Turn variables into php array
         */
        $calc_page = CalcPage::findOrFail($id);

        /**
         * return CalcPageView with Model data array 
         */
        return view('CalcPageView', 
        [
            'id' => $calc_page->id,
            'title' => $calc_page->formula_name,
            'description' => $calc_page->formula_description,
            'formula_sympi' => $calc_page->formula_sympi,
            'variables' => $calc_page->variables_json,
        ]
    );}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
