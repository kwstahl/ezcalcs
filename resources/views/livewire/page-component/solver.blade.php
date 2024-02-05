<button wire:click="checkProgress">
    Try it
</button>

<div>
    @isset($answer)
    {{ $answer }}
    @endisset

    @empty($answer)
        heyoooo
    @endempty
</div>


