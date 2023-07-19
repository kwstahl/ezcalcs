<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Formula Name</th>
                <th>Formula Description</th>
                <th>Formula Sympy</th>
                <th>Variables in JSON</th>
                <th>Topic</th>
            </tr>    
        </thead>

        <tbody>
            @foreach($calcPages as $eqnName => $eqnData)
                <tr wire:key="eqnData-field-{{ $eqnName }}">
                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.id">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.formula_name">
                    </td>
                
                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.formula_description">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.formula_sympi">
                    </td>

                    <td>
                        <hr>

                        @foreach($variables[$eqnData->id] as $variableName => $variable)
                            <ul wire:key="var-field-{{ $variableName }}">
                            {{ $variableName }}<br>
                                <li>Unit<input type="text" wire:model="variables.{{ $eqnData->id }}.{{ $variableName }}.unit"> </li>
                                <li>Sympi Symbol<input type="text" wire:model="variables.{{ $eqnData->id }}.{{ $variableName }}.sympi_symbol"> </li>
                                <li>Latex Symbol<input type="text" wire:model="variables.{{ $eqnData->id }}.{{ $variableName }}.latex_symbol"> </li>
                                <li>Description<input type="text" wire:model="variables.{{ $eqnData->id }}.{{ $variableName }}.description"> </li>

                            </ul>

                            
                            
                        @endforeach

                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.topic">
                    </td>
            

                    <td><button type="button" wire:click="deletePage('{{ $eqnData['id'] }}')">Delete</button></td>
                </tr>

                {{ json_encode($variables->get($eqnData->id))}}

            @endforeach

            {{ dump($variables) }}
        </tbody>
    </table>

    <button type="button" wire:click="save">Save</button>

</div>
