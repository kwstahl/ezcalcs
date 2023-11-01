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

    <select id = "{{ $name }}" >
        @foreach ($optionsArray as $option => $value)
            <option value={{ $getOption($option)->conversion_to_base }}>
                {{ $getOption($option)->symbol }}
            </option>
        @endforeach

        @php
            echo $name;
        @endphp
    </select>

</div>
