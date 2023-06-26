<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" id="{{ $index }}" wire:model="variable.{{ $index }}.unit">
            <text>
                {{ $this->createUnitDropdownItems($variable['unit']) }}
            </text>
        </div>    
    @endforeach


</div>