<div>

    @foreach ($variables as $variable_name => $variable_props)
        {{ $variable_name }}:
        @foreach ($variable_props as $variable_property => $variable_value)
            {{ $variable_property }}: {{ $variable_value }}
        @endforeach
        <br>
    @endforeach
    <br>



</div>