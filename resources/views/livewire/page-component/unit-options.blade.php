<div class="col-4 dropdown">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        hallo
        {{ $selectedOption }}
    </button>

    <ul class="dropdown-menu" id="dropdown-container">
        @foreach ($optionsArray as $option => $value)
            <li>
                <button class="dropdown-item">
                    {{ $this->$option['symbol'] }}
                    {{ $this->$option->id }}
                </button>
            </li>
        @endforeach
    </ul>
</div>
