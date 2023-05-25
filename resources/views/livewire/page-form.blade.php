<div>
    Suh

    @foreach ($variables as $variable_name => $variable_props)
        {{ $variable_name }}:

        {{ json_encode($variable_props) }}
    @endforeach



</div>