<!-- Accordion -->
<div class="col-lg-2 col-md-3 col-sm-3 col-xl-2 p-0">
    <div class="accordion accordion-flush" id="accordionExample">
        <!-- Physics Group -->
        @foreach($pagesByTopic as $topic => $pageByTopic)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $topic }}">{{ $topic }}</button>
            </h2>

            <div id="collapse-{{ $topic }}" class="accorion-collapse collapse show" data-bs-parent="#accordion">
                <div class="accordion-body p-1">

                    <ul class="list-group list-group-flush">
                        @foreach($pagesByTopic[$topic] as $pageName => $pageModel)
                        <li class="list-group-item p-0">
                            <a href="{{ $this->setUrl($pageByTopic[$pageName]['id']) }}" class="stretched-link p-1 link-dark link-underline link-underline-opacity-0">{{ $pageByTopic[$pageName]['formulaName'] }}</a></li>
                        
                        @endforeach
                        </ul>
                </div>
            </div>
        </div>
    @endforeach


    </div>