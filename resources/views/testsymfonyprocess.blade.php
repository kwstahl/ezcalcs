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
        <script type="text/javascript" src="/var/www/html/ezcalcs/resources/js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        @livewireStyles
    </head>
    <body>
        <h1>Symfony Test Process </h1>
        <h2>
          
        </h2>
        <form action="{{ route('eqn.store') }}" method="POST">
            @method('POST')
            @csrf
            
            <input type="submit">
        </form>
        <button id="addVarButton">Add Variable</button>

        <script src="" async defer></script>
        @livewireScripts
    </body>
</html>