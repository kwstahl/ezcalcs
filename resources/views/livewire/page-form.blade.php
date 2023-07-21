<form class="row">

<div>
        @foreach($variables as $variableName => $variable)
            <div wire:key="variable-field-{{ $variableName }}">
                <text>{{ $variable['unit'] }}</text>
                <div>
                    <input type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
                    
                    <input 
                        type="text" 
                        name="{{$variableName}}" 
                        wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                        @if($variableToSolveFor === $variableName) 
                            disabled 
                        @endif>
                
                </div>
                <select wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                    <option selected>{{ $variableName }}</option>
                    @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                        <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                    @endforeach
                </select>
            </div>    
        @endforeach

        <div>
            <button wire:click.prevent="setAnswer">Run Script</button>
        </div>

        <div>
            Answer: {{ $answer }}
        </div>
</div>
</form>