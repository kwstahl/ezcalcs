<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'] }}</text>
            <input type="text" id="$variable.{{ $index }}" wire:model="variable.{{ $index }}.unit">
        </div>    
    @endforeach


</div>