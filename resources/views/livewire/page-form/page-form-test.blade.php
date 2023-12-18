<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            <div class="row gx-1 gy-1 mb-1 p-2" wire:key="variable-field-{{ $variableName }}">
                <div class="col-8">
                    <div class="input-group">

                        <!--  Radio  -->
                        <livewire:page-component.radio :attributes-array="$variables_json[$variableName]" />


                        <!-- Input Text -->
                        <div class="form-floating">
                            <livewire:page-component.variables :attributes-array="$variable" />
                        </div>
                    </div>
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

    <livewire:page-component.unit-options :name="$message" :options-array="$testUnit" :base-option="$message"/>
    <livewire:page-component.variables :attributes-array="$testVar" wire:key="velocity"/>
    <livewire:page-component.radio :attributes-array="$testVar" />


    <livewire:page-component.unit-options :name="$message" :options-array="$testUnit" :base-option="$message" />
    <livewire:page-component.variables :attributes-array="$testVar2" wire:key="time" />
    <livewire:page-component.radio :attributes-array="$testVar2" />


    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

</div>
    <div>
    </div>

</div>

