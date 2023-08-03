<div class="row p-2">
    <form class="">
        <!-- Row Created for each variable -->
        @foreach ($variables as $variableName => $variable)
            <div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
                <div class="col-8">
                    <!-- Input group -->
                    <div class="input-group">
                        <!--  Input Radio  -->
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="radio" name="solveFor" value="{{ $variableName }}"
                                wire:model="variableToSolveFor">
                        </div>

                        <!-- Input Text -->
                        <div class="form-floating">
                            <input class="form-control" type="text" name="{{ $variableName }}"
                                wire:model="boundDataForSympy.{{ $variableName }}.Value"
                                @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>

                            <label>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
                        </div>
                    </div>
                </div>

                <!-- Options dropdown, options created for each unit -->
                <div class="col-4 form-floating">

                    <select class="form-select" wire:model.lazy="boundDataForSympy.{{ $variableName }}.unit_conversion"
                        id="{{ $variableName }}">
                        <option selected>{{ $variableName }}</option>
                        @foreach ($variable['unitOptions'] as $subUnitIndex => $subUnit)
                            <option value="{{ $subUnit['conversion_to_base'] }}"> {{ $subUnit['symbol'] }} </option>
                        @endforeach
                    </select>

                    <label> Unit: {{ $variable['unit'] }}</label>
                </div>
            </div>
            <hr>
        @endforeach
    </form>



    <!-- This will push to the 'scripts' stack on the main CalcPageView -->
    @push('scripts')
        <script>
            //get all the selects on the form, add an event listener for each one that listens for any changes.
            var selectElements = document.querySelectorAll('.form-select');

            selectElements.forEach(function(selectElement) {
                selectElement.addEventListener('change', function(event) {

                    //Get the index of the selected option, and retrieve its innerHTML.
                    var selectId = event.target.id;
                    var selectedIndex = event.target.selectedIndex;
                    var selectedOption = event.target.options[selectedIndex];
                    var selectedText = selectedOption.innerHTML;
                    var variableToSolveFor = @this.variableToSolveFor;


                    if (variableToSolveFor == selectId)
                        Livewire.emit('testAdd', selectedText);
                });
            });
        </script>
    @endpush

    <div>
        <button class="btn btn-primary" type="button" wire:click.prevent="setAnswer">Run Script</button>
    </div>

    <h1 class="display-6 text-align-center">
        Solve for: <strong><i>{{ $variableToSolveFor }}</i></strong> in units of: <strong><i>{{ $variableToSolveForUnit }}</i></strong>
    </h1>

    <h1>
        {{ $answer }} {{ $variableToSolveForUnit }}
    </h1>
</div>
