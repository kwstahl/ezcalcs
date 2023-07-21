
<!-- 
    
-$index is exactly the variable name, in first loop.
-The variable name, and the unit of the variable (from json) call createUnitDropdownItems, which defines the public $unitOptions class
-This gives each unitOptions[$variable] and creates a collection that pulls from the units table, creating a collection of the available units. It is matching up with
    the unit_class, for which $index queries the unit_class in the collection, and [0] is the symbol argument, and [1] is the conversion factor.

-->
    @foreach($variables as $variableName => $variable)
        <div class="" wire:key="variable-field-{{ $variableName }}">
            <label class="">{{ $variable['unit'] }}</label>

            <input class="form-check-input mt-0" type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
            <input 
                class=""
                type="text" 
                name="{{$variableName}}" 
                wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                @if($variableToSolveFor === $variableName) 
                    disabled 
                @endif>
            

                <select class="form-select" wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                    <option selected>{{ $variableName }}</option>
                    @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                        <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                    @endforeach
                </select>
        </div>    
    @endforeach

    <div>
        <div>
            <button wire:click.prevent="setAnswer">Run Script</button>
        </div>

        <div>
            Answer: {{ $answer }}
        </div>
    </div>