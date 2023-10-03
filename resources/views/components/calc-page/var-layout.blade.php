@props(['variableName', 'variableToSolveFor', 'variable', 'unitOptions'])

<div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
    <div class="col-8">
        <div class="input-group">

            <!--  Radio  -->
            <div class="input-group-text">
                <x-calc-page.radio/>
            </div>

            <!-- Input Text -->
            <div class="form-floating">
                <x-calc-page.variable-input/>
            </div>
        </div>
    </div>


    <!-- Dropdown list -->
    <div class="col-4 form-floating">
        <x-calc-page.dropdown :$bind">
            <!-- Options -->
            @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
                <option value="{{ $unit['conversion_to_base'] }}">
                    {{ $unit['symbol'] }}
                </option>
            @endforeach
        </x-calc-page.dropdown>
        <label> Unit: {{ $variable['unit'] }}</label>
    </div>
</div>
<hr>
