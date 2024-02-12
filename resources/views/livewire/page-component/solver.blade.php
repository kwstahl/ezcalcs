<div>
    <button wire:click="checkProgress">
        Try it
    </button>

    <div wire:loading wire:target="checkProgress">
        Calculating...
    </div>

    <div>
        @isset($this->answer)
            {{ $answer }}
        @endisset

        @isset($this->errorOut)
            {{ $errorOut }}
        @endisset
    </div>

</div>


