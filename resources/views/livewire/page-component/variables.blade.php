<input class="form-control" type="text" wire:model.defer="{{ $this->inputValue }}" @disabled($this->disabled) wire:key="{{$this->sympy_symbol}}">
<label>{{ $this->sympy_symbol }} ({{ $this->latex_symbol }}) hi </label>
