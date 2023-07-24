<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
        @foreach($variables as $variableName => $variable)
            <button class="nav-link" id ="nav-{{ $variableName }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $variableName }}" type="button" role="tab"> {{ $variableName }} </button>
        @endforeach
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0"> {{ $description }} </div>
        @foreach($variables as $variableName => $variable)
            <div class="tab-pane fade" id="nav-{{ $variableName }}" role="tabpanel" tabindex="0"> {{ $variable->description }} </div>
        @endforeach
    
  </div>