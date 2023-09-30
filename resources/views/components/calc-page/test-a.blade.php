@props(['variableName', 'variable'])

<input class="form-control" type="text" name="{{ $variableName }}"
    wire:model.defer="variableInputData.{{ $variableName }}.Value"
    @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>
