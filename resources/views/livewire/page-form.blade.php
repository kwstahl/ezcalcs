<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" id="{{ $index }}" wire:model="variable.{{ $index }}.unit">
            <text>
                {{ $this->createUnitDropdownItems($index, $variable['unit']) }}
                Variable: {{ $index }} <br>
                Unit: {{ $variable['unit'] }}
            </text>
        </div>    
    @endforeach


</div>