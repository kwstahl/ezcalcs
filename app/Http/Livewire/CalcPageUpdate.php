<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CalcPageUpdate extends Component
{
    //provides validation rules
    
    public $calcPages;
    public $variablesWithPageId;
    protected $rules = [
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympy' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'calcPages.*.topic' => 'nullable',
        'calcPages.*.formula_latex' => 'nullable',

        'variablesWithPageId.*.*.unit' => 'nullable',
        'variablesWithPageId.*.*.latex_symbol' => 'nullable',
        'variablesWithPageId.*.*.sympy_symbol' => 'nullable',
        'variablesWithPageId.*.*.description' => 'nullable',
        'variablesWithPageId.*.*.type' => 'nullable',
    ];

    public function mount()
    {
        $this->calcPages = CalcPage::all();

        //when saving a calcPage, the variables are stored separately because of their own collection logic. 
        //Therefore, they must have a way to be linked to their respective page. This property handles that.
        $this->variablesWithPageId = $this->calcPages->mapWithKeys(function($calcPage, $key){
            return [$calcPage['id'] => $calcPage['variables_json']];
        });

    }

    public function deletePage($pageId)
    {
        $page = CalcPage::find($pageId);
        if ($page) {
            $page->delete();
        }

        return redirect()->to('/eqn/create');
    }

    public function save()
    {
        $this->validate();
        foreach ($this->calcPages as $index => $calcPage){

            $updatedPage = CalcPage::find($calcPage['id']);
            //set all properties for the model
            $updatedPage->id = $calcPage['id'];
            $updatedPage->formula_name = $calcPage['formula_name'];
            $updatedPage->formula_latex = $calcPage['formula_latex'];
            $updatedPage->formula_description = $calcPage['formula_description'];
            $updatedPage->formula_sympy = $calcPage['formula_sympy'];            
            $updatedPage->topic = $calcPage['topic'];
            $updatedPage->variables_json = $this->variablesWithPageId->get($updatedPage->id);

            $updatedPage->save();

        }
        return redirect()->to('/eqn/create');

    }

    public function render()
    {
        return view('livewire.calc-page-update');
    }
}
