<div>
    <button wire:click="checkProgress">
        Try it
    </button>

    <div>
        @isset($this->answer)
            {{ $answer }}
        @endisset

        @empty($this->answer)
            heyoooo
        @endempty

        {{ $formulaSympy }}
    </div>
</div>
