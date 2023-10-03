@aware(['variableName', 'label'])
@props(['bind'])

<select class="form-select" wire:model.defer="bind" id="{{ $variableName }}" wire:ignore>
    <option selected>{{ $variableName }}</option>

    <!-- Options -->
    {{ $slot }}

</select>


