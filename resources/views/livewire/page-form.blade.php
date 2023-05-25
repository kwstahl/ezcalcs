<div>

    @foreach ($variables as $variable_name)

        {{ print_r($variable_name) }};<br>
        <label>{{ $variable_name['unit'] }}</label> <br>
        <label>{{ $variable_name['sympi_symbol'] }}</label> <br>
        <label>{{ $variable_name['latex_symbol'] }}</label> <br>
        <label>{{ $variable_name['description'] }}</label> <br>
        <br>
    @endforeach
    <br>



</div>