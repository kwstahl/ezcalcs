@aware(['variableName', 'bind', 'variable', 'type' => ''])

<div class="$attributes->merge(['class' => 'col-4 form-floating'])">
    <select type="$type" class="form-select" id="{{ $variableName }}" wire:model.defer="{{ $bind }}" wire:ignore>
        <!-- Options -->
        {{ $slot }}
    </select>
</div>
