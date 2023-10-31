<div>
    <h1>{{ $name }}</h1>
    @foreach($optionsArray as $option=>$value)
        {{ $option }}
    @endforeach

    <div>
        <h2>
            {{ $baseOption }}
            {{ $days }}
        </h2>
    </div>

</div>
