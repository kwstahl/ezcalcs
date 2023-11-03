<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            @switch($variable['type'])
                @case('variable')
                    <x-calc-page.var-layout :$variable :$variableName :$unitOptions :$variableToSolveFor>
                        <div class="col-4 dropdown d-grid">
                            <div class="btn-group">
                                <button class="btn bg-white" type="button">

                                    @isset($variables[$variableName]['unit_symbol'])
                                        {{ $variables[$variableName]['unit_symbol'] }}
                                    @endisset

                                    @empty($variables[$variableName]['unit_symbol'])
                                        Select a Unit
                                    @endempty
                                </button>
                                <button class="btn dropdown-toggle dropdown-toggle-split bg-white" data-bs-toggle="dropdown"
                                    type="button">
                                </button>

                                <ul class="dropdown-menu">
                                    @foreach ($unitOptions[$variableName] as $unitName => $unit)
                                        <li>
                                            <button class="dropdown-item" type="button"
                                                wire:click="$emit('setUnit', '{{ $variableName }}', '{{ $unitName }}')">
                                                {{ $unit['symbol'] }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
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
                    @error('variables.{{ $variableName }}.Value')
                        {{$variableName}}
                    @enderror
                </ul>
            </div>
            <div>
                @foreach($this->errorBagThing() as $errorName => $error)
                    @error($errorName)
                        <div>Need {{ $errorName }}</div>
                    @enderror
                @endforeach
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
            Livewire.hook('message.processed', (message, component) => {
                MathJax.typeset();
                console.log(component);
            });
        </script>
    @endpush

    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

    <h1>

    </h1>

</div>
