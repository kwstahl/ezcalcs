
<!-- 
    
-$index is exactly the variable name, in first loop.
-The variable name, and the unit of the variable (from json) call createUnitDropdownItems, which defines the public $unitOptions class
-This gives each unitOptions[$variable] and creates a collection that pulls from the units table, creating a collection of the available units. It is matching up with
    the unit_class, for which $index queries the unit_class in the collection, and [0] is the symbol argument, and [1] is the conversion factor.

-->
    @foreach($variables as $variableName => $variable)
        <div class="row" wire:key="variable-field-{{ $variableName }}">
            <div class="col-sm">
                <label class="">{{ $variable['unit'] }}</label>
            </div>

            <div class="col-sm-7">
                <div class="input-group">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
                    </div>
                    <input 
                        class="form-control"
                        type="text" 
                        name="{{$variableName}}" 
                        wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                        @if($variableToSolveFor === $variableName) 
                            disabled 
                        @endif>
                </div>
            </div>
            

            <div class="col-sm">
                <select class="form-select" wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                    <option selected>{{ $variableName }}</option>
                    @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                        <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                    @endforeach
                </select>
            </div>
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