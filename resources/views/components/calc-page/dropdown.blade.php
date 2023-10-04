@aware(['variableName', 'bind', 'variable'])

<div class="$attributes->merge(['class' => 'col-4 form-floating'])">
    <select class="form-select" id="{{ $variableName }}" wire:model.defer="{{ $bind }}" wire:ignore>
        <!-- Options -->
        {{ $slot }}
    </select>
</div>
