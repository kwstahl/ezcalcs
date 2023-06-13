<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTable extends Component
{
    public $units;

    public function mount()
    {
        $units = Unit::all()->get();
    }

    public function render()
    {

        return view('livewire.unit-table');
    }
}
