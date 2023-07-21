<form class="row">
    <div>
        @foreach($variables as $variableName => $variable)
            <div class="row mb-1 gx-1 gy-2 align-items-center" wire:key="variable-field-{{ $variableName }}">
                <div class="col-1">
                    <div class="form-check align-items-center justify-content-center">
                        <input class="form-check-input" type="radio" name="solveFor" value="{{$variableName}}" wire:model="variableToSolveFor">
                    </div>
                </div> 

                <div class="col-7 form-floating">
                    <input 
                        class="form-control"
                        type="text" 
                        name="{{$variableName}}" 
                        wire:model="boundDataForSympy.{{ $variableName }}.Value" 
                        @if($variableToSolveFor === $variableName) 
                            disabled 
                        @endif
                    >
                    <label>{{ $variableName }}</label>
                </div>

                <div class="col-4 form-floating">
                    <select class="form-select" wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                        <option selected>{{ $variableName }}</option>
                        @foreach($variable['unitOptions'] as $subUnitIndex => $subUnit)
                            <option value="{{ $subUnit['conversion_to_base'] }}">{{ $subUnit['symbol'] }} </option>
                        @endforeach
                    </select>
                    <label> Unit: {{$variable['unit'] }}</label>
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