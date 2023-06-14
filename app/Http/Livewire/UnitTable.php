<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTable extends Component
{
    public $unitsTable;
    public $unitClasses;

    public function mount()
    {
        $this->unitsTable = DB::table('units');
        $this->unitClasses = $this->unitsTable->distinct('unit_class')->get()->flatten();
    }

    public function render()
    {

        return view('livewire.unit-table');
    }
}
