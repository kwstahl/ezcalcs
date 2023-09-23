<div>
        <form>
            <input type="text" wire:model="new_id">id, separate by ;<br>
            <input type="text" wire:model="new_symbol">symbol sep by ;<br>
            <input type="text" wire:model="new_conversion_to_base">conversion factor sep by ;<br>
            <input type="text" wire:model="new_unit_class">unit class<br>
            <input type="text" wire:model="new_base_unit">base unit<br>
            <input type="text" wire:model="new_description">description<br>
            <input type="text" wire:model="new_type">type<br>
            <button type="button" wire:click="newUnit">Save</button>
        </form>


        <label for="unitClass">Unit Classes</label>
        <select id="unitClass" wire:model="selectedUnitClass">
        @foreach($unitClasses as $unitClass)
            <option value = "{{ $unitClass }}">{{ $unitClass }}</option>
        @endforeach
        </select>

        <label for="baseUnit">Unit Classes</label>
        <select id="baseUnit" wire:model="selectedUnitClass">
        @foreach($baseUnits as $baseUnit)
            <option value = "{{ $baseUnit }}">{{ $baseUnit }}</option>
        @endforeach
        </select>

        <form wire:submit.prevent="save">
            @method('POST')
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Class</th>
                        <th>symbol</th>
                        <th>Base Unit</th>
                        <th>Description</th>
                        <th>Conversion to Base</th>
                        <th>Type</th>
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

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.description">
                        </td>

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.conversion_to_base">
                        </td>

                        <td>
                            <input type="text" wire:model="units.{{ $index }}.type">
                        </td>

                        <td>
                            <button type="button" wire:click="deleteUnit('{{ $unit['id'] }}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
            
        </form>

        <button wire:click="save">Save</button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

{{ dump($units) }}
</div>
