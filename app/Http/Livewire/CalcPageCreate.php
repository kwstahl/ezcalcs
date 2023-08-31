<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalcPageCreate extends Component
{

    public $newPage;
    public $variableCollections;
    public $numberOfVariables = 1;

    protected $rules = [
        'newPage.id' => 'nullable',
        'newPage.formula_name' => 'nullable',
        'newPage.formula_description' => 'nullable',
        'newPage.formula_sympy' => 'nullable',
        'newPage.formula_latex' => 'nullable',
        'newPage.topic' => 'nullable',
        
        'variableCollections.*.unit' => 'nullable',
        'variableCollections.*.latex_symbol' => 'nullable',
        'variableCollections.*.sympy_symbol' => 'nullable',
        'variableCollections.*.description' => 'nullable',
        'variableCollections.*.type' => 'nullable',
        'variableCollections.*.variable_name' => 'nullable',
    ];

    public function mount()
    {
        $this->numberOfVariables = 1;
        $this->newPage = collect();
        $this->variableCollections = collect();
    }

    public function create()
    {
        $this->prepVariableCollectionsForModel();
        $this->validate();

        $newPage = CalcPage::create([
            'id' => $this->newPage['id']
        ]);

        $newPage->formula_name = $this->newPage['formula_name'];
        $newPage->formula_description = $this->newPage['formula_description'];
        $newPage->formula_sympy = $this->newPage['formula_sympy'];
        $newPage->formula_latex = $this->newPage['formula_latex']; 
        $newPage->topic = $this->newPage['topic'];
        $newPage->variables_json = $this->variableCollections;

        $newPage->save();

        return redirect()->to('/eqn/create');
    }

    public function prepVariableCollectionsForModel()
    {
        // For each variable, set variable_name as the key, and remove it from the collection
        $this->variableCollections = $this->variableCollections->mapWithKeys(function($variableAttributes){
            $variableName = $variableAttributes['variable_name'];
            unset($variableAttributes['variable_name']);
            return [$variableName => $variableAttributes];
        });
    }

    public function render()
    {
        return view('livewire.calc-page-create');
    }
}
