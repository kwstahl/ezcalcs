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
        
        <!-- Logic to edit existing Models -->
        @livewire('calc-page-update')

        <!-- Logic to Create New Models -->
        @livewire('calc-page-create')
        
        @livewireScripts
    </body>
</html>