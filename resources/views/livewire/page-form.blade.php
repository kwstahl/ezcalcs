<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $index }}">
            <text>{{ $variable['unit'][$index] }}</text>
            <input type="text" wire:model="variable.{{ $index }}.unit">
        </div>    
    @endforeach


</div>