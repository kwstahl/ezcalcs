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

        @livewireStyles



        @livewire('site-head')
        <style>
            .nav-link {
                color: black !important;
            }

            .nav-link.active {
                background-color: #2d4356 !important;
                color: white !important;
            }

            .nav-link:hover {
                background-color: #a76f6f !important;
            }

            a.list-group-item:hover {
                background-color: black !important;
                border: rounded;
            }
            


        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>


    <body class="justify-content-center text-center align-items-center" style="background-color: #EAB2A0;">

        @livewire('top-bar')

        <div class="container-fluid p-0 m-0 rounded border-none" style="background-color: #2d4356; height: 100vh">
            <div class="card text-white justify-content-center text-center align-items-center">
                @livewire('logo-component')

                <div class="card-img-overlay">


                    <div class="card-header" style="background-color: #2D4356; opacity:0.8;">
                        <header>
                            <h1 class="p-5">Welcome to <strong>EzCalculators</strong>
                            </h1>
                        </header>

                    </div>
                    @livewire('sidebar')


                </div>
            </div>
        </div>
        @livewireScripts
        @stack('scripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    </body>

    </html>
