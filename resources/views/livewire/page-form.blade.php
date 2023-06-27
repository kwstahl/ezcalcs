<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" id="{{ $index }}" wire:model="variable.{{ $index }}.unit">
                {{ $this->createUnitDropdownItems($index, $variable['unit']) }}
            <select>
                @foreach($unitOptions[$index][0] as $option)
                    <option>{{ $option[0] }}</option>
                @endforeach
            </select>
        </div>    
    @endforeach


</div>