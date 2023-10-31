<div>
    <h1>{{ $name }}</h1>
    @foreach($optionsArray as $option=>$value)
        {{ $option }}
    @endforeach

    <div>
        <h2>
            {{ $baseOption }}
            {{ $getOptions('days') }}
        </h2>
    </div>

</div>
