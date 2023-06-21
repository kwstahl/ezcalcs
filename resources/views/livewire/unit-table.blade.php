<div>
        <label for="unitClasses">Unit Classes</label>
        <select name="unitClasses" id="unitClasses">
        @foreach($this->unitClasses as $unitClass)
            <option>{{ $unitClass->unit_class }}</option>
        @endforeach
        </select>

        <form wire:submit.prevent="save">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Unit Class</th>
                    <th>symbol</th>
                    <th>Base Unit</th>
                </tr>

                
                @foreach($unitData as $index => $unitData)
                <tr>
                    <td wire:key="unitData-field-{{ $unitData->id }}">
                        <input type="text" wire:model="unitData.{{ $index }}.id">
                    </td>

                    <td wire:key="unitData-field-{{ $unitData->unit_class }}">
                        <input type="text" wire:model="unitData.{{ $index }}.unit_class">
                    </td>

                    <td wire:key="unitData-field-{{ $unitData->symbol }}">
                        <input type="text" wire:model="unitData.{{ $index }}.symbol">
                    </td>

                    <td wire:key="unitData-field-{{ $unitData->base_unit }}">
                        <input type="text" wire:model="unitData.{{ $index }}.base_unit">
                    </td>
                </tr>
                @endforeach

                
            </table>
            <button type="submit">Save</button>
        </form>

</div>
