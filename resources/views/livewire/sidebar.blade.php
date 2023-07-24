<!-- Accordion -->
<div class="col-lg-2 col-md-3 col-sm-3 col-xl-2 p-0 border shadow">
    <div class="accordion accordion-flush" id="accordionExample">
        <!-- Physics Group -->
        @foreach($pagesByTopic as $topic => $pageByTopic)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $topic }}">{{ $topic }}</button>
            </h2>

            <div id="collapse-{{ $topic }}" class="accorion-collapse collapse show" data-bs-parent="#accordion">
                <div class="accordion-body p-1 shadow">
                    <div class="list-group list-group-flush">
                        @foreach($pagesByTopic[$topic] as $pageName => $pageModel)
                            <a href="{{ $this->setUrl($pageByTopic[$pageName]['id']) }}" class="list-group-item list-group-item-action p-1">{{ $pageByTopic[$pageName]['formulaName'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>