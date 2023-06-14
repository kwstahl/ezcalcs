<div>
        <label for="unitClasses">Unit Classes</label>
        <select name="unitClasses" id="unitClasses">
        @foreach($this->unitClasses as $unitClass)
            <option>{{ $unitClass->unit_class }}</option>
        @endforeach
        </select>


</div>
