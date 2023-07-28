<div class="row p-2">
<form class="">
    <!-- Row Created for each variable -->
    @foreach ($variables as $variableName => $variable)
        <div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
            <div class="col-8">
                <!-- Input group -->
                <div class="input-group">
                    <!--  Input Radio  -->
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="radio" name="solveFor" value="{{ $variableName }}"
                            wire:model="variableToSolveFor">
                    </div>

                    <!-- Input Text -->
                    <div class="form-floating">
                        <input class="form-control" type="text" name="{{ $variableName }}"
                            wire:model="boundDataForSympy.{{ $variableName }}.Value"
                            @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>

                        <label>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
                    </div>
                </div>
            </div>

            <!-- Options dropdown, options created for each unit -->
            <div class="col-4 form-floating">

                <select class="form-select" wire:model="boundDataForSympy.{{ $variableName }}.unit_conversion">
                    <option selected>{{ $variableName }}</option>
                    @foreach ($variable['unitOptions'] as $subUnitIndex => $subUnit)
                        <option value="conversion_to_base: {{ $subUnit['conversion_to_base'] }}, 'symbol': {{ $subUnit['symbol'] }}"> {{ $subUnit['symbol'] }} </option>
                    @endforeach
                </select>

                <label> Unit: {{ $variable['unit'] }}</label>
            </div>
        </div>
        <hr>
    @endforeach
</form>


<div>
    <button class="btn btn-primary" type="button" wire:click.prevent="setAnswer">Run Script</button>
</div>

<h1 class="display-6 text-align-center">
    Solve For: {{ $variableToSolveFor }} in {{ $boundDataForSympy[$variableToSolveFor]['unit_conversion']['symbol'] }} <br> {{ $answer }} <br>
</h1>
</div>