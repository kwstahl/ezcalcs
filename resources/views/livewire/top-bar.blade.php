        <nav class="navbar bg-body-tertiary shadow rounded p-0 m-1 sticky-top">
            <div class="container-fluid p-2 shadow rounded" style="background-color: #A76F6F;">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('favinal.png') }}" width="30" height="24"
                            class="d-inline-block align-text-top rounded">
                        EzCalculators Home
                    </a>


                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" d>
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Offcanvas on Navbar, hidden on screen larger than lg -->
                <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Other Formulas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>


        
                    <div class="offcanvas-body">

                    @unless(Request::is('/'))
                        @livewire('sidebar')
                    @endunless

                    </div>
                </div>
        </nav>