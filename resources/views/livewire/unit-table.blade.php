<div>
        <label for="unitClass">Unit Classes</label>
        <select id="unitClass" wire:model="selectedUnitClass">
        @foreach($unitClasses as $unitClass)
            <option value = "{{ $unitClass }}">{{ $unitClass }}</option>
        @endforeach
        </select>

        <form wire:submit.prevent="save">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Class</th>
                        <th>symbol</th>
                        <th>Base Unit</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($units as $index => $unit)
                    <tr wire:key="unit-field-{{ $unit->id }}">
                        <td>
                            <input type="text" wire:model="units.{{ $index }}.id">
                        </td>

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.unit_class">
                        </td>

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.symbol">
                        </td>

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.base_unit">
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
            <button type="submit">Save</button>
        </form>

</div>
