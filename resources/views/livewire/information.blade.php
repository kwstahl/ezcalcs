


<nav class="shadow rounded">
    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>

        @foreach ($variables as $variableName => $variable)
            <button class="nav-link" id="nav-{{ $this->prepareForHtmlIdNaming($variableName) }}-tab" data-bs-toggle="tab"
                data-bs-target="#nav-{{ $this->prepareForHtmlIdNaming($variableName) }}" type="button" role="tab">{{ $variableName }} ({{$variable['latex_symbol']}})</button>
        @endforeach

    </div>
</nav>

<div class="tab-content p-2" id="nav-tabContent">
    <div class="tab-pane fade show active p-2" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab"
        tabindex="0"> {{ $description }} 
    </div>

    @foreach ($variables as $variableName => $variable)
        <div class="tab-pane fade" id="nav-{{ $this->prepareForHtmlIdNaming($variableName) }}" role="tabpanel" tabindex="0">
            {{ $variable['description'] }} 
        </div>
    @endforeach

</div>
