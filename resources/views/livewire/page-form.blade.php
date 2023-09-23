<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            <div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
                <div class="col-8">
                    <div class="input-group">
                        <!--  Radio  -->
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="radio" name="solveFor" value="{{ $variableName }}"
                                wire:model="variableToSolveFor">
                        </div>

                        <!-- Input Text -->
                        <div class="form-floating">
                            <input class="form-control" type="text" name="{{ $variableName }}"
<<<<<<< Updated upstream
                                wire:model="jsonForSympyParsing.{{ $variableName }}.Value"
=======
                                wire:model.defer="variableInputData.{{ $variableName }}.Value"
>>>>>>> Stashed changes
                                @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>
                            <label wire:ignore>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
                        </div>
                    </div>
                </div>


                <!-- Dropdown list -->
                <div class="col-4 form-floating">
<<<<<<< Updated upstream
                    <select class="form-select" wire:model.lazy="jsonForSympyParsing.{{ $variableName }}.unit_conversion"
                        id="{{ $variableName }}">
                        <option selected>Select Unit</option>
                        @foreach ($unitsForVariables[$variableName] as $unitIndex => $unit)
=======
                    <select class="form-select" wire:model.defer="variableInputData.{{ $variableName }}.unit_conversion"
                        id="{{ $variableName }}">
                        <option selected>{{ $variableName }}</option>
                        @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
>>>>>>> Stashed changes
                            <option value="{{ $unit['conversion_to_base'] }}"> {{ $unit['symbol'] }} </option>
                        @endforeach
                    </select>
                    <label> Unit: {{ $variable['unit'] }}</label>
                </div>
            </div>
            <hr>
        @endforeach

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center gx-4">
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Solve for
                    Variable</button>
            </div>


            <div class="col-5 bg-white shadow rounded overflow-hidden">
                <div class="d-flex flex-row ">
                    <h3>Answer: {{ $answer }}</h3>
                </div>
            </div>
        </div>
    </form>


    @push('scripts')
        <script>
            
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

    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>


</div>
