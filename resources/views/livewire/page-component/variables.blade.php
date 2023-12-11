<input class="form-control" type="text" name="{{ $name }}" wire:model.defer="{{ $inputValue }}" {{$disabled}}>
<label>{{ $name }} ({{ $this->latex_symbol }}) </label>
