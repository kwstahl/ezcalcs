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

            <select>
                @foreach($unitOptions[$index][0] as $option)
                    <option>{{ $option[0] }}</option>
                @endforeach
            </select>
        </div>    
    @endforeach


</div>