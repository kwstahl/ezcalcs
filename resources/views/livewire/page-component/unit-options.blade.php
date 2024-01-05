<div class="col-4 dropdown">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        @empty($selectedOption)
            Select a Unit
        @endempty

        @isset($selectedOption)
            {{ $selectedOption['id'] }}
        @endisset
    </button>

    <ul class="dropdown-menu" id="dropdown-container">
        @foreach ($optionsArray as $option => $value)
            <li>
                <button class="dropdown-item" wire:click="changeSelectedOption('{{ $this->$option['id'] }}')">
                    {{ $this->$option['symbol'] }}
                    {{ $this->$option['id'] }}
                </button>
            </li>
        @endforeach
    </ul>
    @error('selectedOption')
        <div class="alert alert-danger">
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</div>
