<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            <div class="row gx-1 gy-1 mb-1 p-2"">
                <div class="col-8">
                    <div class="input-group">
                        <!--  Radio  -->
                        <livewire:page-component.radio :attributes-array="$variables_json[$variableName]" />
                        <!-- Input Text -->
                        <livewire:page-component.variables :attributes-array="$variable" />
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </form>
    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

</div>
<div>
</div>

</div>
