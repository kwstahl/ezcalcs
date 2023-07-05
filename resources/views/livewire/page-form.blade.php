<div>

<!-- 
    
-$index is exactly the variable name, in first loop.
-The variable name, and the unit of the variable (from json) call createUnitDropdownItems, which defines the public $unitOptions class
-This gives each unitOptions[$variable] and creates a collection that pulls from the units table, creating a collection of the available units. It is matching up with
    the unit_class, for which $index queries the unit_class in the collection, and [0] is the symbol argument, and [1] is the conversion factor.

-->

    @foreach($variablesCollection as $variableName => $variable)
        <div wire:key="variable-field-{{ $variableName }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" wire:model="pyData.{{ $variableName }}.Value">
            
            
            <select wire:model="pyData.{{ $variableName }}.Unit">
                <option selected>{{ $variableName }}</option>
                @foreach($variablesCollection[$variableName]['unitOptions'] as $subUnitIndex => $subUnit)
                    <option value={{ $subUnit['conversion_to_base'] }}>{{ $subUnit['symbol'] }} </option>
                @endforeach
        </select>
        </div>    
        @endforeach


    {{ dump($pyData) }} PyData <br>

</div>
