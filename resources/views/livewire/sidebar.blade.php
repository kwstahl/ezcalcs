<!-- For homepage, generate list group and tabs for use on index. Else, create offcanvas sidebar -->


@if (Request::is('/'))
    <!-- Homepage Navigation Tabs -->
    <nav>
        <div class="nav nav-tabs p-2 justify-content-center rounded" id="nav-tab" role="tablist"
            style="background-color: #eab2a0;">
            <button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#tab-info">About
                Us</button>
            <!-- Generated Tabs from Models -->
            @foreach ($pagesByTopic as $topic => $pageByTopic)
                <button class="nav-link" id="nav-{{ $topic }}-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-{{ $topic }}" type="button" role="tab" aria-controls="nav-home"
                    aria-selected="true">{{ $topic }}</button>
            @endforeach
        </div>
    </nav>


    <!-- Homepage Navigation Content -->
    <div class="tab-content" id="nav-tabContent">
        <!-- About Us Tab Content -->
        <div class="tab-pane fade show active" id="tab-info" role="tabpanel" tabindex="0">
            <main>
                <div class="" style="background-color: #2D4356; opacity:0.8;">
                    <p class="card-text">At <strong>EzCalculators</strong>, we're here to simplify the complex world
                        of
                        <strong>formulas</strong> and <strong>equations</strong> from a multitude of disciplines.
                        Whether you're a student, a professional, or an enthusiast, our website is your go-to
                        resource
                        for solving equations across various fields, all in one place.
                    </p>

                    <p class="card-text">Imagine having the power to <em>effortlessly solve complex
                            calculations</em> in
                        physics,
                        engineering, chemistry, finance, and more, right at your fingertips. Our intuitive
                        calculator
                        platform allows you to <strong>input your variables</strong>, select your preferred units,
                        and
                        watch as our advanced algorithms do the heavy lifting, delivering accurate results in
                        seconds.
                    </p>
                </div>
            </main>
        </div>

        <!-- Generated Content for Tabs by Model -->
        @foreach ($pagesByTopic as $topic => $pageByTopic)
            <div class="tab-pane fade p-0 justify-content-center text-center" id="tab-{{ $topic }}"
                role="tabpanel" tabindex="0">
                <div class="list-group list-group-flush justify-content-center align-items-center">
                    <div class="col-6 rounded p-2" style="background-color: #2d4255; opacity:95%;"
                        id="buttonContainer-{{ $topic }}">

                        @foreach ($pagesByTopic[$topic] as $pageName => $pageModel)
                            <button href="{{ $this->setUrl($pageByTopic[$pageName]['id']) }}"
                                class="mb-1 ma-1 list-group-item list-group-item-action text-center justify-content-center"
                                style="background-color: #2d4255; border-color: white; color: white; opacity:100%">{{ $pageByTopic[$pageName]['formulaName'] }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@else
    <!-- Offcanvas Sidebar -->
    <div class="accordion accordion-flush" id="accordionExample">
        @foreach ($pagesByTopic as $topic => $pageByTopic)
            <div class="accordion-item">
                <h1 class="accordion-header" id="heading{{ $topic }}">
                    <button class="accordion-button" style="background-color: #454545; color:white;" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $topic }}"><strong>{{ $topic }}</strong></button>
                </h1>

                <div id="collapse-{{ $topic }}" class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample">
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
@endif

