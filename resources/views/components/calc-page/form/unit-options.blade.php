<div>
    <h1>{{ $name }}</h1>
    @foreach ($optionsArray as $option => $value)
        {{ $option }}
    @endforeach


    <div>
        <h2>
            {{ $baseOption }}
            {{ $getOption('days')->type }}
        </h2>
    </div>

    <select id = "{{ $name }}">
        @foreach ($optionsArray as $option => $value)
            <option value={{ $getOption($option)->conversion_to_base }}>
                {{ $getOption($option)->symbol }}
            </option>
        @endforeach
</div>
</select>

<button class="btn dropdown-toggle dropdown-toggle-split bg-white" data-bs-toggle="dropdown" type="button">

</button>

<ul class="dropdown-menu">
    @foreach ($optionsArray as $option => $value)
        <li>
            <button class="dropdown-item" type="button">
                {{ $getOption($option)->symbol }}
            </button>
        </li>
    @endforeach
</ul>

</div>
