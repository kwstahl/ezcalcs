<div>
    <h1>{{ $name }}</h1>
    @foreach($optionsArray as $option=>$value)
        {{ $option }}
    @endforeach

    {{dump($optionsArray)}}
    <div>
        <h2>
            {{ $baseOption }}
            {{ $getOption('days') }}
        </h2>
    </div>

</div>
