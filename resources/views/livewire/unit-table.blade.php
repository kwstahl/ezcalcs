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

            <tr>
                <td></td>
            </tr>

            <tr></tr>

            <tr></tr>

            <tr></tr>
        </table>


</div>
