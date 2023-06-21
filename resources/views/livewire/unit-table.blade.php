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
                    @foreach($units as $unit)
                        <tr>
                            <td>
                                {{ $unit->id }}
                            </td>

                            <td><input type="text" wire:model="units.{{ $loop->index }}.id"></td>

                            <td><input type="text" wire:model="units.{{ $loop->index }}.symbol"></td>

                            <td><input type="text" wire:model="units.{{ $loop->index }}.unit_class"></td>

                            <td><input type="text" wire:model="units.{{ $loop->index }}.base_unit"></td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            <button type="submit">Save</button>
        </form>

</div>
