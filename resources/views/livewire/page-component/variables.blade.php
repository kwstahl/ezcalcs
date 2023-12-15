<input class="form-control" type="text" wire:key="{{ $name }}" {{ $disabled }} wire:model.defer="{{ $inputValue }}" {{$disabled}}>
<label>{{ $name }} ({{ $this->latex_symbol }}) </label>
