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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @livewireStyles
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div>Hello world</div>
        <form>
        @isset($id)
            {{ $id }} <br>
            {{ $title }} <br>
            {{ $description }} <br>
            {{ $formula_sympi }} <br>


            @livewire('page-form', 
            ['variables' => $variables, 'formula_sympi' => $formula_sympi])

        @endisset
            <input type = 'submit'> 
        </form>
        <script async defer>
            $(document).ready(function(){
                var previousValue = null;
                var currentValue = null;

                $('input[type="radio"]').change(function(){
                    previousValue = currentValue;
                    currentValue = $(this).val();
                    $(`input[name="${currentValue}"]`).prop('disabled', true);
                    $(`input[name="${previousValue}"]`).prop('disabled', false);

                    console.log('Prev', previousValue);
                    console.log('Cur', currentValue);
                });
            });
        </script>
        @livewireScripts
    </body>
</html>