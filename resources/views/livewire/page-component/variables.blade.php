<div wire:key="{{ $this->name }}-variable">
    <input class="form-control" type="text" wire:model.defer="inputValue" @disabled($this->disabled)>
    <label wire:ignore>{{ $this->sympy_symbol }} ({{ $this->latex_symbol }}) </label>

    @error('inputValue')
    <div class="alert alert-danger">
            <span class="error">{{ $message }}</span>
    </div>
    @enderror
</div>
