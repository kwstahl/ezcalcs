@aware(['variableName', 'bind', 'variable'])

<div class="col-4 form-floating">

    <select class="form-select" id="{{ $variableName }}" wire:model.defer="{{ $bind }}" wire:ignore>
        <option selected>{{ $variableName }}</option>

        <!-- Options -->
        {{ $slot }}

    </select>
    <label> Unit: {{ $variable['unit'] }}</label>
</div>
