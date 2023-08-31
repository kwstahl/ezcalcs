<div>
    <form>

        <input type="text" wire:model="newPage.id">ID<br>
        <input type="text" wire:model="newPage.formula_name">Formula Name<br>
        <input type="text" wire:model="newPage.formula_description">Formula Description<br>
        <input type="text" wire:model="newPage.formula_sympy">Formula Sympy<br>
        <input type="text" wire:model="newPage.formula_latex">Formula Latex<br>
        <input type="text" wire:model="newPage.topic">Topic<br>

        <input type="number" wire:model="numberOfVariables"> Number of Variables <br>

        @for ($i = 1; $i <= $numberOfVariables; $i++)
            <div>
                <h3>Variable {{ $i }}</h3>
                <hr>

                <input type="text" wire:model="variableCollections.{{ $i }}.variable_name">Variable Name<br>

                <input type="text" wire:model="variableCollections.{{ $i }}.unit">Unit<br>
                <input type="text" wire:model="variableCollections.{{ $i }}.sympy_symbol">Sympy Symbol<br>
                <input type="text" wire:model="variableCollections.{{ $i }}.latex_symbol">Latex Symbol<br>
                <input type="text" wire:model="variableCollections.{{ $i }}.description">Description<br>
                <input type="text" wire:model="variableCollections.{{ $i }}.type">Type<br>
            </div>
        @endfor
    </form>

    <button wire:click="create">Create New Page</button>

</div>
