<div class="row p-3">
    <form>
        <div class="col-6 p-3">
            <input type="text" wire:model="newPage.id" class="form-control">ID<br>
            <input type="text" wire:model="newPage.formula_name" class="form-control">Formula Name<br>
            <textarea type="text" wire:model="newPage.formula_description" class="form-control"></textarea>Formula Description<br>
            <textarea type="text" wire:model="newPage.formula_sympy" class="form-control"></textarea>Formula Sympy<br>
            <textarea type="text" wire:model="newPage.formula_latex" class="form-control"></textarea>Formula Latex<br>
            <input type="text" wire:model="newPage.topic" class="form-control">Topic<br>
        </div>
        <hr>
        <input type="number" wire:model="numberOfVariables" class="form-control col-3 mw-50 p-2"> Number of Variables <br>
        <hr> <div class="col-12 p-2 row">
        @for ($i = 1; $i <= $numberOfVariables; $i++)
            <div class="col-5 p-3">
                <h3>Variable {{ $i }}</h3>
                <hr>

                Variable Name<input type="text" wire:model="variableCollections.{{ $i }}.variable_name"
                    class="form-control"><br>
                Unit<input type="text" wire:model="variableCollections.{{ $i }}.unit"
                    class="form-control"><br>
                Sympy Symbol<input type="text" wire:model="variableCollections.{{ $i }}.sympy_symbol"
                    class="form-control"><br>
                Latex Symbol<input type="text" wire:model="variableCollections.{{ $i }}.latex_symbol"
                    class="form-control"><br>
                Description
                <textarea type="text" wire:model="variableCollections.{{ $i }}.description" class="form-control"></textarea><br>
                Type<input type="text" wire:model="variableCollections.{{ $i }}.type"
                    class="form-control"><br>
            </div>
        @endfor
</div>
<button wire:click="create" class="button" type="button">Create New Page</button>

</form>


</div>
