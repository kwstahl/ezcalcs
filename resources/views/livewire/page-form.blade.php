<div>

    @foreach($variablesCollection as $index => $variable)
        <div wire:key="variable-field-{{ $variable->$index }}">
            <input type="text" wire:model="variable.{{ $index }}.unit">
        </div>    
    @endforeach


</div>