<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;

class PageForm extends Component
{
    /** $id passed in from CalcPageView */
    public function render()
    {
        return view('livewire.page-form');
    }
}
