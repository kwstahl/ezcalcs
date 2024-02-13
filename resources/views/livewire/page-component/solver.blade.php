<div>
    <button wire:click="calculate">
        Try it
    </button>

    <div wire:loading wire:target="calculate">
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


