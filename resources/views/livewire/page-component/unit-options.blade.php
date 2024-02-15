<div class="col-4 dropdown" wire:key="unit-{{ $this->variableSympySymbol }}">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        <span>
            @empty($selectedOption)
                Select a Unit
            @endempty
        </span>

        <span>
            @isset($selectedOption)
                {{ $selectedOption['id'] }}
            @endisset
        </span>
    </button>

    <ul class="dropdown-menu" id="dropdown-container">
        @foreach ($optionsArray as $option => $value)
            <li wire:key="option-{{ $this->$option['id'] }}">
                <button class="dropdown-item" wire:click="changeSelectedOption('{{ $this->$option['id'] }}')">
                    {{ $this->$option['symbol'] }}
                    {{ $this->$option['id'] }}
                </button>
            </li>
        @endforeach
    </ul>
    <div>
        @error('selectedOption')
            <div class="alert alert-danger">
                <span class="error">{{ $message }}</span>
            </div>
        @enderror
    </div>

</div>
