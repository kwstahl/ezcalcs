<div>
    <h1>{{ $name }}</h1>

    @foreach($optionsArray as $option => $value)
        <div> {{ $option }}</div>
    @endforeach

    <div>
        <h2>
            {{ $baseOption }}
        </h2>
    </div>

</div>
