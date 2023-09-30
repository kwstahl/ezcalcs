@aware['bind'=>'bind', 'variableName']

<select class="form-select" wire:model.defer="$bind"
    id="{{ $variableName }}" wire:ignore>
    <option selected>{{ $variableName }}</option>

    <!-- Options -->
    {{ $slot }}

</select>
