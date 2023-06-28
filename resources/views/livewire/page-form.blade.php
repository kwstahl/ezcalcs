<div>

<!-- 
    
-$index is exactly the variable name, in first loop.
-The variable name, and the unit of the variable (from json) call createUnitDropdownItems, which defines the public $unitOptions class
-This gives each unitOptions[$variable] and creates a collection that pulls from the units table, creating a collection of the available units. It is matching up with
    the unit_class, for which $index queries the unit_class in the collection, and [0] is the symbol argument, and [1] is the conversion factor.

-->

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" id="variableValue.{{ $index }}">
            
            <select wire:model="variablesCollection.{{ $index }}.unitOptionsCollection">
                
                {{ dump($this->variablesCollection[$index]['unitOptionsCollection']) }}
            @foreach($this->variablesCollection[$index]['unitOptionsCollection'] as $option)
                    <option>{{ $option['symbol'] }}</option>
                @endforeach
            </select>
        </div>    
    @endforeach

    {{ dump($variablesCollection) }}

</div>