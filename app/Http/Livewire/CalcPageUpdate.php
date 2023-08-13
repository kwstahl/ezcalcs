<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalcPageUpdate extends Component
{
    public $calcPages;
    public $variables;

    protected $rules = [
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympi' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'calcPages.*.topic' => 'nullable',
        'calcPages.*.formula_latex' => 'nullable',
        'variables.*.*.unit' => 'nullable',
        'variables.*.*.latex_symbol' => 'nullable',
        'variables.*.*.sympi_symbol' => 'nullable',
        'variables.*.*.description' => 'nullable',
        'variables.*.*.type' => 'nullble',
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

    public function save()
    {
        $this->validate();
        foreach ($this->calcPages as $index => $page){
            $pageModel = CalcPage::find($page['id']);
            $pageModel->id = $page['id'];
            $pageModel->formula_name = $page['formula_name'];
            $pageModel->formula_latex = $page['formula_latex'];
            $pageModel->formula_description = $page['formula_description'];
            $pageModel->formula_sympi = $page['formula_sympi'];
            $pageModel->variables_json = $this->variables->get($pageModel->id);
            $pageModel->topic = $page['topic'];
            $pageModel->save();
        }
        return redirect()->to('/eqn/create');

    }

    public function render()
    {
        return view('livewire.calc-page-update');
    }
}
