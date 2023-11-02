
<div class="col-4 dropdown">
    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
        hallo
    </button>

    <ul class="dropdown-menu">
        @foreach ($optionsArray as $option => $value)
            <li>
                <a class="dropdown-item" href="#">
                    {{ $getOption($option)->symbol }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
