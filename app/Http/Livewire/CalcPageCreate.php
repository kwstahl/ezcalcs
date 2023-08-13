<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalcPageCreate extends Component
{
    public $calcPages;
    public $variables;
    public $numberOfVariables;
    public $keyNames;

    protected $rules = [
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympi' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'calcPages.*.topic' => 'nullable',
        'calcPages.*.formula_latex' => 'nullable',
        'variables.*.unit' => 'nullable',
        'variables.*.latex_symbol' => 'nullable',
        'variables.*.sympi_symbol' => 'nullable',
        'variables.*.description' => 'nullable',
        'variables.*.type' => 'nullable',
        'variables.*.variable_name' => 'nullable',
    ];

    public function mount()
    {
        $this->numberOfVariables = 1;
        $this->calcPages = collect();
        $this->variables = collect();
        $this->keyNames = collect();
    }

    public function create()
    {
        $this->mapVariableNames();
        $this->validate();

        $newPageModel = CalcPage::create([
            'id' => $this->calcPages['new']['id']
        ]);

        $newPageModel->formula_name = $this->calcPages['new']['formula_name'];
        $newPageModel->formula_description = $this->calcPages['new']['formula_description'];
        $newPageModel->formula_sympi = $this->calcPages['new']['formula_sympi'];
        $newPageModel->formula_latex = $this->calcPages['new']['formula_latex']; 
        $newPageModel->topic = $this->calcPages['new']['topic'];
        $newPageModel->variables_json = $this->variables;

        $newPageModel->save();

        return redirect()->to('/eqn/create');
    }

    public function mapVariableNames()
    {
        $this->variables = $this->variables->mapWithKeys(function($item){
            $key = $item['variable_name'];
            unset($item['variable_name']);
            return [$key => $item];
        });
    }

    public function render()
    {
        return view('livewire.calc-page-create');
    }
}
