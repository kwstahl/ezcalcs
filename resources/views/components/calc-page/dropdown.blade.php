@aware(['bind', 'variableName', 'label'])


<select class="form-select" bind="$bind" id="{{ $variableName }}" wire:ignore>
    <option selected>{{ $variableName }}</option>

    <!-- Options -->
    {{ $slot }}

</select>


