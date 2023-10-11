<div class="row p-2">

    <form wire:submit.prevent="submit">

        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            @switch($variable['type'])
                @case('variable')
                    <x-calc-page.var-layout :$variable :$variableName :$unitOptions :$variableToSolveFor>

                        <!-- Dropdown list -->
                        <!--
                        <div class="col-4 form-floating">
                            <select class="form-select" id=" $variableName "
                                wire:model.defer="variableInputData. $variableName .unit_conversion" wire:ignore>
                                <option selected> $variableName </option>
                                foreach ($unitOptions[$variableName] as $unitIndex => $unit)
                                    <option value=" $unit['conversion_to_base'] ">
                                         $unit['symbol']
                                    </option>
                                endforeach
                            </select>
                            <label> Unit:  $variable['unit'] </label>
                        </div>

                        -->

                        <div class="btn-group col-4">
                            <button class="btn" type="button">
                                @isset($variableInputData[$variableName]['unit_symbol'])
                                    <span>{{ $variableInputData[$variableName]['unit_symbol']}}</span>
                                @endisset

                                @empty($variableInputData[$variableName]['unit_symbol'])
                                    Select a Unit
                                @endempty
                            </button>
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">

                            </button>

                            <ul class="dropdown-menu" wire:ignore>
                                @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
                                    <li>
                                        <button class="dropdown-item" type="button" wire:click="setUnitInputData('{{$variableName}}', '{{$unitIndex}}')">
                                            {{ $unit['symbol'] }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </x-calc-page.var-layout>
                @break

                @case('constant')
                @break

                @case('unitless')
                    <x-calc-page.unitless-layout :$variable :$variableName :$variableToSolveFor />
                @break
            @endswitch
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

    <h1>

    </h1>

</div>
