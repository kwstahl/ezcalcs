<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Str;


class Sidebar extends Component
{
    public $calcPages;
    public $pagesByTopic;

    public function mount()
    {
        $this->calcPages = CalcPage::all();
        $this->pagesByTopic = $this->calcPages->mapToGroups(function($item, $key){
            return [
                $item->topic => 
                ['topic' => $item->topic,
                'id' => $item->id,
                'formulaName' => $item->formula_name,]
            ];
        });
    }   

    public function setUrl($pageId)
    {
        echo "/eqn/{$pageId}";
    }



    public function render()
    {
        return view('livewire.sidebar');
    }


}
