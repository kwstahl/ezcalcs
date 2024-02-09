<div>
    <button wire:click="checkProgress">
        Try it
    </button>

    <div>
        @isset($this->answer)
            {{ $answer }}
        @endisset

        @empty($this->answer)
        @endempty

        @isset($this->errorOut)
            {{ $errorOut }}
        @endisset

        @empty($this->errorOut)
        @endempty
        {{ $formulaSympy }}
    </div>
</div>
