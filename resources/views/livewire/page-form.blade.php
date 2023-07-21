<form class="row gx-3 gy-2 align-items-center">
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

                <div class="col-sm-7">
                    <input 
                        class="form-control"
                        type="text" 
                        name="{{$variableName}}" 
                        wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                        @if($variableToSolveFor === $variableName) 
                            disabled 
                        @endif
                    >
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
            <button wire:click.prevent="setAnswer">Run Script</button>
        </div>

        <div>
            Answer: {{ $answer }}
        </div>
    </div>
</form>