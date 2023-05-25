<div>

    @foreach ($variables as $variable_name)
        <h1>{{ $variable_name }}:</h1>
        <label>{{ $variable_name['unit'] }}</label> <br>
        <label>{{ $variable_name['sympi_symbol'] }}</label> <br>
        <label>{{ $variable_name['latex_symbol'] }}</label> <br>
        <label>{{ $variable_name['description'] }}</label> <br>
        <br>
    @endforeach
    <br>



</div>