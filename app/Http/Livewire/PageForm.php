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
    public $variables;
    public $variablesCollection;
    public $unitOptionsCollection;

    public function mount()
    {
        $this->variablesCollection = collect($this->variables);

        /* Loop creates a collection containing each variable's unit's table for use in creating list options. Collection of collections. */
        $this->unitOptionsCollection = collect();
        foreach($this->variablesCollection as $variable){
            $unitTable = $this->findAllUnitTables($variable);
            $this->unitOptionsCollection->push($unitTable);
        }
    }

 
    public function complex_unit_strings($unit_name)
    {
        /* 
        Compares string of a complex unit to existing tables and returns all found tables as collection.
        
        @Param input: unit table name as string
        @Param output: collection of names of tables in a complex unit

        */
        $unit_table_names = collect();
        $table_names = ['counting', 'current', 'distance', 'length', 'luminosity', 'mass', 'temperature', 'time'];
        foreach($table_names as $table_name){
            $found_table = Str::of($unit_name)->matchAll('/' . $table_name .'/');
            $unit_table_names = $unit_table_names->merge($found_table);
        }
        return $unit_table_names;
    }

    public function find_table_of_base_unit($unit_name)
    {
        /* 

        For base unit. Returns the table as a collection.
        @Pram input: unit table name as string
        @Param output: unit table as collection

        */
        $unit_table = DB::table($unit_name)->get();
        $unit_table = collect([$unit_name => $unit_table]);
        return $unit_table;
    }

    
    public function find_tables_of_complex_unit($unit_name)
    {
        /* 

        For complex unit. Returns the tables of each unit in a complex unit 
        @Param input: complex unit name as string
        @Param output: unit tables as collections, in a collection.

        */
        $tables_of_complex_unit = collect();
        $unit_strings = $this->complex_unit_strings($unit_name);
        foreach($unit_strings as $unit_string){
            $unit_table = DB::table($unit_string)->get();
            $tables_of_complex_unit->put($unit_string, $unit_table); 
        }
        $tables_of_complex_unit->prepend(["complex variable", $unit_name]);
        return $tables_of_complex_unit;
    }
    

    public function findAllUnitTables($variable)
    {
        /* 
        
        Checks for simple or complex unit. Returns collections of the found table based on the Variable[unit] name.
        @input: variable collection class
        @output: variable unit table as collection. If complex, returns a collection of the multiple table collections.

        */

        $unit = $variable['unit'];
        if (Schema::hasTable($unit))
        {
            return $this->find_table_of_base_unit($unit);
        } 

        else 
        {
            return $this->find_tables_of_complex_unit($unit);
        }
    }


    public function render()
    {
        return view('livewire.page-form');
    }
}
