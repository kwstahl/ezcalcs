    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
    <html>

    <head>
        @livewire('site-head')
    </head>


    <body>
        <!-- Top Bar -->
        @livewire('top-bar')


        <!-- Master Container -->
        <div class="p-1 shadow master">
            <div class="container-fluid row p-0 m-0">

                <!-- Navbar, hidden on screen smaller than lg -->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 p-0 d-none d-lg-block">
                    @livewire('sidebar')
                </div>


                <!-- Content -->
                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 p-3 border-none">
                    <!-- Header -->
                    <div class="row p-2">
                        <x-calc-page.title :/>
                        <p class="h1 text-center p-1">{{ $formula_name }}</p>
                        <p class="h2 text-center p-1">{{ $formula_latex }}</p>
                    </div>


                    <!-- Form -->
                    @isset($id)
                        @livewire('page-form', ['variables_json' => $variables_json, 'formula_sympy' => $formula_sympy])
                    @endisset
                </div>

                <!-- Information -->
                <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 p-3 border-none">

                    <div class="row p-3">
                        <p class="h3 text-center p-1">
                            Formula and Variables Information
                        </p>
                    </div>
                    <div>
                        @livewire('information', ['description' => $formula_description, 'variables_json' => $variables_json])
                    </div>
                </div>


                @livewireScripts
                @stack('scripts')

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
                </script>
            </div>
        </div>

    </body>

    </html>
