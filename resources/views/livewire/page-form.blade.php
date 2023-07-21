<form class="row">
    <div>
        @foreach($variables as $variableName => $variable)
            <div class="row" wire:key="variable-field-{{ $variableName }}">

                <div class="col-sm">
                    <label class="">{{ $variable['unit'] }}</label>
                </div>
                
                <div class="col-sm">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
                    </div>
                </div> 


                <input 
                    class="form-control col-sm-7"
                    type="text" 
                    name="{{$variableName}}" 
                    wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                    @if($variableToSolveFor === $variableName) 
                        disabled 
                    @endif
                >

                <div class="col-sm">
                    <select wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                        <option selected>{{ $variableName }}</option>
                        @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                            <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                        @endforeach
                    </select>
                </div>
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