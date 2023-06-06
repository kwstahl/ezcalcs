<div>

    @foreach ($variables as $variable_name)
        <hr>
        {{ key($variable_name) }} <br>
        <label>{{ $variable_name['unit'] }}</label> <br>
        <label>{{ $variable_name['sympi_symbol'] }}</label> <br>
        <label>{{ $variable_name['latex_symbol'] }}</label> <br>
        <label>{{ $variable_name['description'] }}</label> <br>
        <hr>
    @endforeach
    <br>

    <div>
        <p>{{ $this->variable_unit_table_retriever('distance/time') }}</p>
        
    </div>

</div>