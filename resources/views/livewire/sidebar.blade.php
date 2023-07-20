<div class="col-lg-2 col-md-3 col-sm-3 col-xl-2 ">
    <div class="accordion" id="accordionExample">
        <!-- Physics Group -->
        @foreach($pagesByTopic as $topic => $pageByTopic)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $topic }}">{{ $topic }}</button>
            </h2>

            <div id="collapse-{{ $topic }}" class="accorion-collapse collapse show" data-bs-parent="#accordion">
                <div class="accordion-body p-1">
                    <ul class="list-unstyled w-100 m-0">

                        @foreach($pagesByTopic[$topic] as $pageName => $pageModel)
                        <li class="listElements"><a href="{{ echo: url('/eqn/{$pageByTopic[$pageName]["id"]}') }}"
                                class="d-block w-100 h-100 bg-light text-dark p-1">{{ $pageByTopic[$pageName]['formulaName'] }}</a></li>
                        
                        @endforeach
                        </ul>
                </div>
            </div>
        </div>
    @endforeach


    </div>