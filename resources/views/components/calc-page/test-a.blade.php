@props(['variableName', 'variable'])

<div class="form-floating">
    <input class="form-control" type="text" name="{{ $variableName }}"
        wire:model.defer="variableInputData.{{ $variableName }}.Value"
        @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>
    <label wire:ignore>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
</div>
