
<!-- Update Pages -->
<div class="row">
    <table class="container row">
        <thead>
            <tr>
                <th>ID</th>
                <th>Formula Name</th>
                <th>Formula Description</th>
                <th>Formula Sympy</th>
                <th>Formula Latex</th>
                <th>Topic</th>
                <th>Variables</th>
            </tr>    
        </thead>

        <tbody class="row">
            @foreach($calcPages as $pageIndex => $pageModel)
                <tr wire:key="pageModel-field-{{ $pageIndex }}">
                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.id" class="form-control">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_name" class="form-control">
                    </td>
                
                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_description" class="form-control">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_sympy" class="form-control">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_latex" class="form-control">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.topic" class="form-control">
                    </td>

                    <td>
                        <hr>
                        <!-- The pageModel must be used to assign the matching id on this template against the component class -->
                        @foreach($variablesWithPageId[$pageModel->id] as $variableName => $variable)

                            <ul wire:key="var-field-{{ $variableName }}">
                            {{ $variableName }}<br>
                                <li>Unit<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.unit" class="form-control"> </li>
                                <li>Sympy Symbol<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.sympy_symbol" class="form-control"> </li>
                                <li>Latex Symbol<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.latex_symbol" class="form-control"> </li>
                                <li>Description<textarea type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.description" class="form-control"></textarea> </li>
                                <li>Type<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.type"class="form-control"> </li>
                            </ul>

                        @endforeach

                    </td>

                    <td><button type="button" wire:click="deletePage('{{ $pageModel['id'] }}')">Delete Page</button></td>

                </tr>
            @endforeach

        </tbody>
    </table>

    <button type="button" wire:click="save">Save and Update Changes</button>

</div>
