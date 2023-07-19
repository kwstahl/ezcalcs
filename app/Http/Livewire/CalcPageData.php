<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalcPageData extends Component
{
    public $calcPages;
    public $variables;

    protected $rules = [
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympi' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'variables.*.unit' => 'nullable',
        'variables.*.latex_symbol' => 'nullable',
        'variables.*.sympi_symbol' => 'nullable',
        'variables.*.description' => 'nullable',
    ];


    public function mount()
    {
        $this->calcPages = CalcPage::all();
        $this->variables = $this->calcPages->mapWithKeys(function($item, $key){
            return [$item['id'] => $item['variables_json']];
        });
    }

    public function deletePage($pageId)
    {
        $page = CalcPage::find($pageId);

        if ($page) {
            $page->delete();

            $this->calcPages = $this->calcPages->reject(function($item) use ($pageId){
                return $item['id'] == $pageId;
            });
        }
    }

    private function inputsToJson()
    {
        $this->validate();
        foreach ($this->calcPages as $index => $page){
            $pageModel = CalcPage::find($page['id']);
            $pageModel->id = $page['id'];
            $pageModel->formula_name = $page['formula_name'];
            $pageModel->formula_description = $page['formula_description'];
            $pageModel->formula_sympi = $page['formula_sympi'];
            $pageModel->variables_json = $page['variables_json']->toJson();
            $pageModel->save();
        }

    }

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.calc-page-data');
    }
}
