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
            @foreach($calcPages as $index => $page)
                <tr wire:key="page-field-{{ $page->id }}">
                    <td>
                        <input type="text" wire:model="calcPages.{{ $index }}.id">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $index }}.formula_name">
                    </td>
                
                    <td>
                        <input type="text" wire:model="calcPages.{{ $index }}.formula_description">
                    </td>

                    <td>
                        <input type="text" wire:model="calcPages.{{ $index }}.formula_sympi">
                    </td>

                    <td>
                        <ul class="">
                            <li class="">Test1 <input type="text"></li>
                            <li class="">Test2 <input type="text"></li>
                        </ul>
                    </td>


                    <td>
                        <input type="text" wire:model="calcPages.{{ $index }}.topic">
                    </td>
                
                    <td><button type="button" wire:click="deletePage('{{ $page['id'] }}')">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
