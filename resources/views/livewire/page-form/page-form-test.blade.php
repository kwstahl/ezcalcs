<div class="row p-2">
    <form wire:submit.prevent="submit">
        <!-- Input Group Row Created for each variable -->
        @foreach ($variables_json as $variableName => $variable)
        <div>
            <!--  Radio  -->
            <livewire:page-component.radio :attributes-array="$variable"/>
            <!-- Input Text -->
            <livewire:page-component.variables :attributes-array="$variable" />
        </div>

        {{ dump($variables_json) }}
        @endforeach
    </form>
    <h1 class="row display-6 text-align-center p-5 justify-content-center">
        You are solving for {{ $variableToSolveFor }}
    </h1>

<div>
    {{ dump($this->getAnOptionArray()) }}
</div>

    <button wire:click="$emit('validationEvent')">
        Try it
    </button>
</div>
<div>
</div>
