@aware(['variableName', 'variable', 'variableToSolveFor'])

<input class="form-control" type="text" name="{{ $variableName }}"
    wire:model.defer="variables.{{ $variableName }}.Value"
    @if ($variableToSolveFor === $variableName) disabled readonly @endif>

<label wire:ignore>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
