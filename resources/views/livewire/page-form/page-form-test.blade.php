<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
            <div>
                <!--  Radio  -->
                <livewire:page-component.radio :attributes-array="$variable" />
                <!-- Input Text -->
                <livewire:page-component.variables :attributes-array="$variable" />
                <livewire:page-component.unit-options :unit-name="$variable['unit']" :variable-sympy-symbol="$variable['sympy_symbol']"/>
            </div>
        @endforeach
    </form>
    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

    <div>

    </div>

    <livewire:page-component.solver :variables-json="$variables_json" :formula-sympy="$formula_sympy"/>

    <div>
    </div>
