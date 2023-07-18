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
        'calcPages.*.*' => 'nullable',
        'calcPages.*.unit' => 'nullable',
    ];

    public function mount()
    {
        $this->calcPages = CalcPage::all();
        $this->variables = collect();
        $this->calcPages->each(function($formula, $formulaName){
            $this->variables->put($formula['id'], $formula['variables_json']);
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

    public function render()
    {
        return view('livewire.calc-page-data');
    }
}
