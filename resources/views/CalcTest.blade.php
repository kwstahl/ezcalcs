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

        <x-components.form.variable :name = 'Velocity' :attributes_array = {{$testVar}}>

    </body>

    </html>
