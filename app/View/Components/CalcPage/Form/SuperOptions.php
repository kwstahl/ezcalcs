<?php

namespace App\View\Components\CalcPage\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class SuperOptions extends Component
{
    public $optionsArray;
    public $baseOption;
    public $selectedOption;

    /**
     * For each object in the optionsArray, set a key given some attribute to set on
     *
     * Transforms optionsArray to a keyed array
     *
     */

    public function setKeysFromIndex(String $indexName)
    {
        $optionsArray = collect($this->optionsArray);
        $keyed = $optionsArray->mapWithKeys(function (array $item, int $key) use ($indexName){
            return [$item[$indexName] => $item];
        });

        $this->optionsArray = $keyed;
    }

    public function setSelectedOptionAsFirst()
    {
        $optionsArray = collect($this->optionsArray);
        $this->selectedOption = $optionsArray->first();
    }

    public function getOption($optionId)
    {
        $optionsArray = $this->optionsArray;
        if (
            !$optionsArray->has([$optionId])
        ) {
            return 'Does not exist';
        }
        return $optionsArray[$optionId];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
    }
}
