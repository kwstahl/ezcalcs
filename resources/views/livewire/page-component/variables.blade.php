<div>
    hi
    {{ $this->unit }}
    {{ $this->unit = 'ham' }}
    {{ $this->unit }}
    {{ $this->description }}
</div>

<input class="form-control" type="text" name="{{ $name }}">
<label wire:ignore>{{ $name }} ({{ $this->latex_symbol }}) </label>
