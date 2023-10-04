@props(['variableName', 'variableToSolveFor', 'variable', 'unitOptions'])

<div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
    <div class="col-8">
        <div class="input-group">

            <!--  Radio  -->
            <div class="input-group-text">
                <x-calc-page.radio />
            </div>

            <!-- Input Text -->
            <div class="form-floating">
                <x-calc-page.variable-input />
            </div>
        </div>
    </div>


    <!-- Dropdown list -->
    <x-calc-page.dropdown class="d-none" :$variable :$variableName bind="variableInputData.{{ $variableName }}.unit_conversion">
        <!-- Options -->
        <option selected>{{ $variableName }}</option>
        @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
            <option value="{{ $unit['conversion_to_base'] }}">
                {{ $unit['symbol'] }}
            </option>
        @endforeach
        <label> Unit: {{ $variable['unit'] }}</label>
    </x-calc-page.dropdown>
</div>
<hr>
