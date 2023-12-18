<input class="form-control" type="text" wire:model.defer="{{ $inputValue }}" @disabled($this->disabled)>
<label>{{ $name }} ({{ $this->latex_symbol }}) </label>
