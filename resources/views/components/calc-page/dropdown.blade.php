@props(['variableName'])


<select class="form-select" id="{{ $variableName }}" wire:model.defer="variableInputData.{{ $variableName }}.unit_conversion" wire:ignore>
    <option selected>{{ $variableName }}</option>

    <!-- Options -->
    {{ $slot }}

</select>


