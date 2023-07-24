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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



    <!-- Top Bar -->
    <nav class="navbar navbar-expand-lg nav.navbar.bg-primary p-0">
        <div class="container-fluid bg-primary">
            <a class="navbar-brand" href="http://www.ezcalculators.online">EzCalcs</a>
        </div>
    </nav>

    <!-- Master Container -->
    <div class="container-fluid row">
        <!-- Accordion col-lg-2 col-md-3 col-sm-3 col-xl-2 p-0 -->
        @livewire('sidebar')

        <!-- Content -->
        <div class="col-lg-7 col-md-6 col-xl-6 col-sm-6 p-3">
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
        <div class="col-lg-3 col-md-3 col-xl-4 col-sm-4 border p-2 shadow">
            @livewire('information', ['description' => $description, 'variables' => $variables])
        </div>
    </div>

    <script async defer></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>
