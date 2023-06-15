<div>
        <label for="unitClasses">Unit Classes</label>
        <select name="unitClasses" id="unitClasses">
        @foreach($this->unitClasses as $unitClass)
            <option>{{ $unitClass->unit_class }}</option>
        @endforeach
        </select>

        <table>
            <tr>
                <th>ID</th>
                <th>Unit Class</th>
                <th>symbol</th>
                <th>Base Unit</th>
            </tr>

            
            @foreach($this->unitData as $unitData)
            <tr>
                <td>{{ $unitData->id }}</td>
                <td>{{ $unitData->unit_class }}</td>
                <td>{{ $unitData->symbol }}</td>
                <td>{{ $unitData->base_unit }}</td>
            </tr>
            @endforeach
        </table>


</div>
