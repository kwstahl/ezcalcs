<div wire:key="{{ $this->variableSympySymbol }}-variable">
    <input class="form-control" type="text" wire:model="inputValue" @disabled($this->disabled)>
    <label wire:ignore>{{ $this->sympy_symbol }} ({{ $this->latex_symbol }}) </label>
    <div class="alert alert-danger">
        @error('inputValue')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

</div>
