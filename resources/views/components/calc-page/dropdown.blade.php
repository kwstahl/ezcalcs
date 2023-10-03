@props(['variableName'])

<div class="col-4 form-floating">

    <select class="form-select" id="{{ $variableName }}"
        wire:model.defer="variableInputData.{{ $variableName }}.unit_conversion" wire:ignore>
        <option selected>{{ $variableName }}</option>

        <!-- Options -->
        {{ $slot }}

    </select>

</div>
