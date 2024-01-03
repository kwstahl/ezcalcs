<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
        <div>
            <!--  Radio  -->
            <livewire:page-component.radio :attributes-array="$variables_json[$variableName]"/>
            <!-- Input Text -->
            <livewire:page-component.variables :attributes-array="$variable" />
        </div>
        @endforeach
    </form>
    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

    <button wire:click="">
        Try it
    </button>
</div>
<div>
</div>
