<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CalcPage;
use Illuminate\Support\Arr;


class CalcController extends Controller
{
    public function test($id)
    {
        $calc_page = CalcPage::findOrFail($id);

        /**
         * return CalcPageView with Model data array 
         */
        return view('CalcTest', 
        [
            'id' => $calc_page->id,
            'formula_name' => $calc_page->formula_name,
            'formula_description' => $calc_page->formula_description,
            'formula_sympy' => $calc_page->formula_sympy,
            'formula_latex' => $calc_page->formula_latex,
            'variables_json' => $calc_page->variables_json,
        ]);
    }

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
            'formula_name' => $calc_page->formula_name,
            'formula_description' => $calc_page->formula_description,
            'formula_sympy' => $calc_page->formula_sympy,
            'formula_latex' => $calc_page->formula_latex,
            'variables_json' => $calc_page->variables_json,
        ]
    );}







}
