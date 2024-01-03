<div wire:key="{{ $this->name }}-variable">
    <input class="form-control" type="text" wire:model="inputValue" @disabled($this->disabled)>
    <label wire:ignore>{{ $this->sympy_symbol }} ({{ $this->latex_symbol }}) hi </label>

    @error('inputValue')
    <div class="alert alert-danger">
            <span class="error">{{ $message }}</span>
    </div>
    @enderror
</div>
