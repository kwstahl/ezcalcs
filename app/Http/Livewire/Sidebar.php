<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;


class Sidebar extends Component
{
    public $formulas;
    public $topics;
    public $topicsArray;

    public function mount()
    {
        $this->topics = CalcPage::all();
        $this->formulas = $this->topics->mapToGroups(function($item, $key){
            return [$item->topic => [
                'topic' => $item->topic,
                'id' => $item->id,
                'formulaName' => $item->formula_name,
            ]];
        });
    }   

    public function render()
    {
        return view('livewire.sidebar');
    }
}
