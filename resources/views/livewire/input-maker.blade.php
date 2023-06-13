<div>
    <button wire:click = "incrementCount">+</button>
    <button wire:click = "decrementCount">-</button>

    @for ($i = 0; $i<$inputCount; $i++)
        <input type="text" name = "input{{$i}}">
    @endfor

</div>
