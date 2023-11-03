<div class="col-4 dropdown">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        hallo

        @isset($selectedOption)
            {{ $selectedOption->symbol }}
        @endisset
    </button>

    <ul class="dropdown-menu">
        @foreach ($optionsArray as $option => $value)
            <li>
                <button class="dropdown-item" onclick="hello($getOption($option)->id)">
                    {{ $getOption($option)->symbol }}
                </button>
            </li>
        @endforeach
    </ul>
</div>
