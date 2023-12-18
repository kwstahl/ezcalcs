<input class="form-control" type="text" wire:key="{{ $name }}" wire:model.defer="{{ $inputValue }}" @disabled("{{$disabled}}")>
<label>{{ $name }} ({{ $this->latex_symbol }}) </label>
