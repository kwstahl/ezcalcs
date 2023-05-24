<div>
    Suh

    @foreach ($variables as $variable)
        {{ json_decode($variable, true) }}
    @endforeach



</div>