<div>
    Suh

    @foreach ($variables as $variable_name => $variable_props)
        {{ $variable_name }}:
        @foreach ($variable_props as $variable_property)
            {{ $variable_property }}
        @endforeach
        <br>
    @endforeach



</div>