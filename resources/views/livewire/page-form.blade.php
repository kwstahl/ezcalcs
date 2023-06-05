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
        <p>{{ $this->check_if_unit_matches_table() }}</p>
    </div>

    <div>
        <p> {{ $this->has_table->dump() }}</p>
        <p> {{ $this->no_table->dump() }}</p>
    </div>
    <div>
        <p> 
            {{ $this->has_table_print_contents()->dump() }} 
        </p>
    </div>



</div>