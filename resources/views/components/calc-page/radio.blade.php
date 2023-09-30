@props(['variableName'])

<input class="form-check-input mt-0" type="radio" name="solveFor" value="{{ $variableName }}"
    wire:model="variableToSolveFor">
