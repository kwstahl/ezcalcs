<input class="form-control" type="text" wire:model.defer="{{ $this->inputValue }}" @disabled($this->disabled)>
<label>{{ $this->sympy_symbol }} ({{ $this->latex_symbol }}) </label>
