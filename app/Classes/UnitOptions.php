<?php

namespace App\Classes;

use PDO;

class EquationOptions{
    public $allOptions;
    public $selectedOption;
    public $selectableOptions;


    //pass in an array of options
    public function __construct($allOptions){
        $this->allOptions = $allOptions;
    }
    //for each object, if passes some truth test, then push to allOptions
    public function setSelectableOptions(callable $truthTest)
    {
        $filteredOptions = [];
        $allOptions = $this->allOptions;


        foreach($allOptions as $option => $value)
        {
            if($truthTest($option, $value))
            {
                array_push($filteredOptions, [$option => $value]);
            }
        }

        return $filteredOptions;

    }

}
