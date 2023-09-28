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
                                wire:model.defer="variableInputData.{{ $variableName }}.Value"
                                @if ($variableToSolveFor === $variableName) disabled
                                    readonly @endif>
                            <label wire:ignore>{{ $variableName }} ({{ $variable['latex_symbol'] }}) </label>
                        </div>
                    </div>
                </div>


                <!-- Dropdown list -->
                <div class="col-4 form-floating">
                    <select class="form-select" wire:model.defer="variableInputData.{{ $variableName }}.unit_conversion"
                        id="{{ $variableName }}" wire:ignore>
                        <option selected>{{ $variableName }}</option>
                        @foreach ($unitOptions[$variableName] as $unitIndex => $unit)
                            <option value="{{ $unit['conversion_to_base'] }}"> 
                                <div>
                                    {{ $unit['symbol'] }} 
                                </div>
                            </option>
                        @endforeach
                    </select>
                    <label> Unit: {{ $variable['unit'] }}</label>
                </div>


            </div>
            <hr>    
@endforeach