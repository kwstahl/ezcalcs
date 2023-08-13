<div>
    <form>

        <input type="text" wire:model="calcPages.new.id">ID (for url)<br>
        <input type="text" wire:model="calcPages.new.formula_name">Formula Name (for display)<br>
        <input type="text" wire:model="calcPages.new.formula_description">Formula Description<br>
        <input type="text" wire:model="calcPages.new.formula_sympi">Formula Sympi (for code logic)<br>
        <input type="text" wire:model="calcPages.new.formula_latex">Formula Latex (for display)<br>
        <input type="text" wire:model="calcPages.new.topic">Topic (for)<br>
        <input type="number" wire:model="numberOfVariables"> Number of Variables <br>

        @for ($i = 1; $i <= $numberOfVariables; $i++)
            <div>
                <h3>Variable {{ $i }}</h3>
                <hr>

                <input type="text" wire:model="variables.{{ $i }}.variable_name">Variable Name<br>

                <input type="text" wire:model="variables.{{ $i }}.unit">Unit<br>
                <input type="text" wire:model="variables.{{ $i }}.sympi_symbol">Sympi Symbol<br>
                <input type="text" wire:model="variables.{{ $i }}.latex_symbol">Latex Symbol<br>
                <input type="text" wire:model="variables.{{ $i }}.description">Description<br>
                <input type="text" wire:model="variables.{{ $i }}.type">Type<br>
            </div>
        @endfor

        <button>Submit</button>
    </form>

    {{ dump($calcPages) }}

    {{ dump($keyNames) }}

    {{ dump($variables) }}

    <button wire:click="create">Map</button>

</div>
