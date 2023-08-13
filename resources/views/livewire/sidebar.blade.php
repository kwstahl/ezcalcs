
    <div class="accordion accordion-flush" id="accordionExample">
        @foreach ($pagesByTopic as $topic => $pageByTopic)
            <div class="accordion-item">
                <h1 class="accordion-header" id="headingOne">
                    <button class="accordion-button" style="background-color: #454545; color:white;" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $topic }}"><strong>{{ $topic }}</strong></button>
                </h1>

                <div id="collapse-{{ $topic }}" class="accorion-collapse collapse show"
                    data-bs-parent="#accordion">
                    <div class="accordion-body p-1 shadow">
                        <div class="list-group list-group-flush">
                            @foreach ($pagesByTopic[$topic] as $pageName => $pageModel)
                                <a href="{{ $this->setUrl($pageByTopic[$pageName]['id']) }}"
                                    class="list-group-item list-group-item-action p-1">{{ $pageByTopic[$pageName]['formulaName'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
