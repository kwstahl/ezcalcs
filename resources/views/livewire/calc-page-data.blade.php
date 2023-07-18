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
                <tr wire:key="eqnData-field-{{ $eqnData->id }}">
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
                        @foreach($eqnData['variables_json'] as $variableName => $variable)
                            <ul wire:key="var-field-{{ $variableName }}">
                            {{ $variableName }}<br>
                                <li>Unit<input type="text" wire:model="calcPages.{{ $eqnData->id }}.variables_json.{{ $variableName }}.unit"> </li>
                                <li>Sympi Symbol<input type="text" wire:model="calcPages.{{ $eqnData->id }}.variables_json.{{ $variableName }}.sympi_symbol"> </li>
                                <li>Latex Symbol<input type="text" wire:model="calcPages.{{ $eqnData->id }}.variables_json.{{ $variableName }}.latex_symbol"> </li>
                                <li>Description<input type="text" wire:model="calcPages.{{ $eqnData->id }}.variables_json.{{ $variableName }}.description"> </li>

                            </ul>

                            
                            
                        @endforeach

                        @foreach($variables as $index => $var)
                            {{ dump($variables[$eqnData->id]['unit']) }}
                        @endforeach

                    </td>


                    <td>
                        <input type="text" wire:model="calcPages.{{ $eqnName }}.topic">
                    </td>
            

                    <td><button type="button" wire:click="deletePage('{{ $eqnData['id'] }}')">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ dump($variables) }}

    <button type="button" wire:click="save">Save</button>

</div>
