<div class="col-4 dropdown">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        hallo
        @isset($selectedOption)
            {{ $selectedOption->symbol }}
        @endisset
    </button>

    <ul class="dropdown-menu" id="dropdown-container">
        @foreach ($optionsArray as $option => $value)
            <li>
                <button class="dropdown-item" wire:click="$set('selectedOption', '{{$this->getOption($option)->symbol}}')"">
                    {{ $this->getOption($option)->symbol }}
                </button>
            </li>
        @endforeach
    </ul>
</div>
