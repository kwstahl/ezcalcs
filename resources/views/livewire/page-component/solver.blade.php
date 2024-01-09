<button wire:click="$emit('validationEvent')">
    Try it
</button>

<div>
    {{ dump(collect($this->sympyDataArray)) }}
</div>
