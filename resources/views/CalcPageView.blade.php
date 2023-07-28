    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            MathJax = {
                startup: {
                    ready() {
                        var CHTMLmath = MathJax._.output.chtml.Wrappers.math.CHTMLmath;
                        CHTMLmath.styles['mjx-container[jax="CHTML"][display="true"]'].margin = '0';
                        CHTMLmath.styles['mjx-container[jax="CHTML"][display="true"]'].display = 'inline';

                        MathJax.startup.defaultReady();
                    }
                }
            }
        </script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    </head>


<body>
    <!--[if lt IE 7]>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Top Bar -->
    <nav class="navbar navbar-expand-md nav.navbar.bg-primary fixed-top p-1">
        <!-- Top Bar -->
        <nav class="navbar nav.navbar.bg-primary">
            <a class="navbar-brand" href="http://www.ezcalculators.online">EzCalcs</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" d>
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Offcanvas on Navbar, hidden on screen larger than lg -->
            <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Other Formulas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body">
                    @livewire('sidebar')
                </div>
            </div>
        </nav>




        <!-- Master Container -->
        <div class="container-fluid row p-1 m-0">

            <!-- Navbar, hidden on screen smaller than lg -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 p-0 border shadow d-none d-lg-block">
                @livewire('sidebar')
            </div>

            <!-- Content -->
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 p-3 border shadow">
                <!-- Header -->
                <div class="row p-2">
                    <p class="h1 text-center p-1">{{ $title }}</p>
                    <p class="h2 text-center p-1">{{ $formula_latex }}</p>
                </div>


                <!-- Form -->
                @isset($id)
                    @livewire('page-form', ['variables' => $variables, 'formula_sympi' => $formula_sympi])
                @endisset
            </div>

            <!-- Information -->

            <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 p-3 border shadow">
                <div class="row">
                    <p class="h3 text-center p-1">
                        Formula and Variables Information
                    </p>
                </div>

        <!-- Information -->

        <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 p-3 border shadow">
            <div class="row p-3">
                <p class="h3 text-center p-1">
                    Formula and Variables Information
                </p>
            </div>

            <div>
                @livewire('information', ['description' => $description, 'variables' => $variables])
                <div>
                    @livewire('information', ['description' => $description, 'variables' => $variables])
                </div>
            </div>
        </div>

        <script async defer></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

    </body>

    </html>
