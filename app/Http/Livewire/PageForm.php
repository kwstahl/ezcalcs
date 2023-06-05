<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Process;

class PageForm extends Component
{
    #passed in as array of var_name:var_props, ...,
    public $variables;
    public $has_table;
    public $no_table;
    public $variables_as_collection;
    public $dumped_vars;
    public $has_table_dump;
    public $no_table_dump;

    public function mount()
    {
        $this->variables_as_collection = collect($this->variables);
        $this->dumped_vars = $this->variables_as_collection->dump();
        $this->has_table = collect();
        $this->no_table = collect();
        $this->has_table_dump = $this->has_table->dump();
        $this->no_table_dump = $this->no_table->dump();

    }

    public function check_if_unit_matches_table()
    {
        $variables_as_collection = $this->variables_as_collection;
        $this->message = "";

        /* 
        Using laravel's "each" method, check that each variable['unit'] has a table by referencing
        the Schema::hasTable
        */
        $variables_as_collection->each(function ($variable){
            $tableName = $variable['unit'];
            if (Schema::hasTable($tableName)){
                $this->message .= "it do has ". $variable['unit'];
                $this->has_table->push($variable);
            }
            else {
                $this->message .= "it don't has". $variable['unit'];
                $this->no_table->push($variable);
            }

        });
        return $this->message;

    }

    public function render()
    {
        return view('livewire.page-form');
    }
}
