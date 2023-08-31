
<!-- Update Pages -->
<div>
    <table>
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

        <tbody>
            @foreach($calcPages as $pageIndex => $pageModel)
                <tr wire:key="pageModel-field-{{ $pageIndex }}">
                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.id">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_name">
                    </td>
                
                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_description">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_sympy">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.formula_latex">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $pageIndex }}.topic">
                    </td>

                    <td>
                        <hr>
                        <!-- The pageModel must be used to assign the matching id on this template against the component class -->
                        @foreach($variablesWithPageId[$pageModel->id] as $variableName => $variable)

                            <ul wire:key="var-field-{{ $variableName }}">
                            {{ $variableName }}<br>
                                <li>Unit<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.unit"> </li>
                                <li>Sympy Symbol<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.sympy_symbol"> </li>
                                <li>Latex Symbol<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.latex_symbol"> </li>
                                <li>Description<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.description"> </li>
                                <li>Type<input type="text" wire:model="variablesWithPageId.{{ $pageModel->id }}.{{ $variableName }}.type"> </li>
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
