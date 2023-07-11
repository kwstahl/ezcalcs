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
            <div>
                <input type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
                <input 
                    type="text" 
                    name="{{$variableName}}" 
                    wire:model="pyData.{{ $variableName }}.Value" 
                    @if($variableToSolveFor === $variableName) 
                        disabled 
                    @endif
                    >
            
            </div>
            <select wire:model="pyData.{{ $variableName }}.unit_conversion">
                <option selected>{{ $variableName }}</option>
                @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                    <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                @endforeach
            </select>
        </div>    
    @endforeach

    <div>
        <text>{{ $answer }}</text>
        <button wire:click="setAnswer">Set Answer</button>

    </div>
    {{ dump($answer) }}
    {{ dump($pyData) }} PyData <br>
    {{ dump($variableToSolveFor) }} Vtsf <br>

</div>
