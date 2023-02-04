<form action="POST">
    {{ $formula_sympi }} <br>
    
    @foreach($variables as $variable => $val)
        <input name={{ $variable }} id={{ $variable }}> {{ $variable }} </input> 

        <select name={{ $val['unit'] }} id={{ $val['unit'] }}></select> <label for={{ $val['unit'] }}> {{ $val['unit'] }} </label>
        
        <br>
    @endforeach

</form>