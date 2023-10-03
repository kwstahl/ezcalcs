@props(['variableName', 'variableToSolveFor', 'variable'])

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
        {{ $slot }}
        <label> Unit: {{ $variable['unit'] }}</label>
    </div>
</div>
<hr>
