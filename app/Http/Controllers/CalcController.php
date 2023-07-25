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
        return view('index');
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
        $formula_inputs_to_create_model = $request->all();
        
        /**
         * 
         * 
         * The variable data comes in JSON form. The PageCreator calls a dynamic script for entering multiple variables
         * Each variable is in the following form:
         * --variable_data['variable_name']
         * ----[variable_name] has the following keys: ['unit'], ['sympi_symbol'], ['latex_symbol'], ['description']
         * 
         * The variable_json_data_for_model puts all the variables of variables_data into a JSON string with primary keys 'variable_name' as described above
         *      
         * 
         * Finally, the model is created into App\Http\Models\CalcPage using the rest of the information from PageCreator view
         * 
         * Remember, all variables are fillable, and variables_json is cast to PHP array
         * 
         */
        $variable_json_data_for_model = json_encode($formula_inputs_to_create_model['variable_data']);
        $variable_json_data_for_model = json_decode($variable_json_data_for_model, true);

        $id = $request->id;
        $formula_name = $request->formula_name;
        $formula_description = $request->formula_description;
        $formula_sympi = $request->formula_sympi;
        $formula_latex = $request->formula_latex;
        
        $model = CalcPage::updateOrCreate(
        [
            'variables_json' => $variable_json_data_for_model,
            'id' => $id,
            'formula_name' => $formula_name,
            'formula_description' => $formula_description,
            'formula_sympi' => $formula_sympi,
            'formula_latex' => $formula_latex,
        ]
        );

        return view('PageCreator');
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

        /** I
         * 
         * f $id finds an existing id in database mariaDB > calc_pages, then pass in data and display
         * CalcPageView. Turn variables attribute into a php array
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
            'formula_latex' => $calc_page->formula_latex,
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

    
    public function testprocess()
    {
        return view('apiTestView');
    }

}
