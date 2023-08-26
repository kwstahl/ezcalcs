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
        @livewire('site-head')

        <style>
            .h1 {
                color: #9DB2BF;
            }

            .h2 {
                color: #9DB2BF;
            }

            .h3 {
                color: #9DB2BF;
            }

            h1 {
                color: #9DB2BF;

            }

            .accordion {
                --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            }

            .nav-link {
                color: white;
            }

            .nav-link:hover {
                color: #EAB2A0 !important;
            }

            .tab-content {
                font-size: 20px;
                color: #9DB2BF;
            }
        </style>
    </head>


    <body style="background-color: #EAB2A0;">
        <!-- Top Bar -->

        @livewire('top-bar')


        <!-- Master Container -->
        <div class="p-1 shadow" style="background-color: #435B66;">
            <div class="container-fluid row p-0 m-0">

                <!-- Navbar, hidden on screen smaller than lg -->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 p-0 d-none d-lg-block">
                    @livewire('sidebar')
                </div>


                <!-- Content -->
                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 p-3 border-none">
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

                <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12 p-3 border-none">

                    <div class="row p-3">
                        <p class="h3 text-center p-1">
                            Formula and Variables Information
                        </p>
                    </div>
                    <div>
                        @livewire('information', ['description' => $description, 'variables' => $variables])
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
