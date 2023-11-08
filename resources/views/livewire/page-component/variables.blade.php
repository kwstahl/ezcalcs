<div>
    hi
    {{ $this->unit }}
    {{ $this->unit = 'ham' }}
    {{ $this->unit }}
    {{ $this->description }}

    {{ $this->latex_symbol }}
</div>

<input class="form-control" type="text" name="{{ $name }}">
<label>{{ $name }} {{ $this->latex_symbol }} </label>
