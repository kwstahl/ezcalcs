<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            <div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
                <div class="col-8">
                    <div class="input-group">

                        <!--  Radio  -->
                        <div class="input-group-text">
                            <x-calc-page.radio :$variableName :$variableToSolveFor/>
                        </div>

                        <!-- Input Text -->
                        <div class="form-floating">
                            <x-calc-page.variable-input :$variableName :$variable :$variableToSolveFor/>
                            <label wire:ignore>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
                        </div>
                    </div>
                </div>


                <!-- Dropdown list -->
                <div class="col-4 form-floating">
                    <x-calc-page.test bind={{variableInputData.{{ $variableName }}.unit_conversion}} :$variableName>
                        <!-- Options -->
                        @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
                            <option value="{{ $unit['conversion_to_base'] }}">
                                <div>
                                    {{ $unit['symbol'] }}
                                </div>
                            </option>
                        @endforeach
                    </x-calc-page.test>
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

    <x-calc-page.form.variable :name="$message" :variable-array="$testVar"/>

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

    <div> {{ $this->call_variables() }}</div>

</div>
