<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\DB;

class PageForm extends Component
{
    #passed in as array of var_name:var_props, ...,
    public $variables;
    public $has_table;
    public $no_table;
    public $variables_as_collection;
    public $dumped_vars;
    public $dumpies;


    public function mount()
    {
        $this->variables_as_collection = collect($this->variables);
        $this->dumped_vars = $this->variables_as_collection->dump();
        $this->has_table = collect();
        $this->no_table = collect();
        $this->check_if_unit_matches_table();
        $this->dumpies = $this->has_table_print_contents();

    }

    public function check_if_unit_matches_table()
    {
        $variables_as_collection = $this->variables_as_collection;

        /* 
        Using laravel's "each" method, check that each variable['unit'] has a table by referencing
        the Schema::hasTable
        */
        $variables_as_collection->each(function ($variable){
            $tableName = $variable['unit'];
            if (Schema::hasTable($tableName)){
                $this->has_table->push($variable);
            }
            else {
                $this->no_table->push($variable);
            }
            
            $this->has_table = collect($this->has_table);
            $this->no_table = collect($this->no_table);
        });
    }

    public function has_table_print_contents(){
        /* 
        Dump the contents of each variable unit from the database. 
        Queries for the table, then pulls all the data from that table
        */
        $this->has_table->each(function($variable, $table_options){
            yield $table_options = DB::table($variable['unit'])->get();
        });
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}
