<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageForm extends Component
{
    #passed in as array of var_name:var_props, ...,
    public $variables;
    public $variables_as_collection;
    public $variable_option_collection;



    public function mount()
    {
        $this->variables_as_collection = collect($this->variables);

        $this->variable_option_collection = collect();
        foreach($this->variables_as_collection as $variable){
            $retrieved_tables = $this->variable_unit_table_retriever($variable);
            $this->variable_option_collection->push($retrieved_tables);
        }
    }

    public function collect_matching_strings($unit_string)
    {
        /* 
        Used in variable_unit_table_retriever to check the complex variable's unit
        for matching names of table. 
        
        @Param input: unit string name from variable
        @Param outpue: collection of matching strings 

        */
        $collection_of_matches = collect();
        $expressions_to_match = ['counting', 'current', 'distance', 'length', 'luminosity', 'mass', 'temperature', 'time'];
        foreach($expressions_to_match as $expression){
            $matching_strings = Str::of($unit_string)->matchAll('/' . $expression .'/');
            $collection_of_matches = $collection_of_matches->merge($matching_strings);
        }
        return $collection_of_matches;
    }

    public function variable_unit_table_retriever($variable)
    {
        /* 
        Checks what the variable's unit is, and if it simple, returns the table records as a collection. If not, uses cross join and retrieves all possible 
        combinations of all units for that variable as collection.

        @input: variable collection class
        @output: all variable's unit table records from DB as collection class. Simple units are just the table's records;
            complex units are returned as a cross join of all the units in the complex unit

        */

        $unit = $variable['unit'];
        if (Schema::hasTable($unit))
        {
            $variable_unit_options = DB::table($unit)->get();
            return $variable_unit_options;
        } 

        else 
        {
            $cross_joined_collection = collect();

            /* 
            Sends to regular expression function that parses, and finds all the base units, outputs back as collection
            of strings
            */
            $collection_of_units_in_complex_unit = $this->collect_matching_strings($unit);
            foreach($collection_of_units_in_complex_unit as $unit)
            {
                $unit_collection = DB::table($unit)->get();
                $cross_joined_collection = $unit_collection->crossJoin($cross_joined_collection);
            }

            return $cross_joined_collection;
        }
    }


    public function render()
    {
        return view('livewire.page-form');
    }
}
