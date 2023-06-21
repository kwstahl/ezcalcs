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

        <script>
            $(document).ready(function(){
                $("td").dblclick(function(){
                    var td = $(this);
                    var value = td.text();
                    
                    var input = $("<input>", {
                        "type": "text",
                        "class": "suh",
                        "value": value
                    });
                    
                    input.blur(function(){
                        td.text(input.val());
                        input.remove();
                    });
                    
                    td.empty().append(input);
                    input.focus();
                });
            });
        </script>
    </head>
    <body>
        <h1>Formula Data</h1>
        <h2>
            ID corresponds to the ID that will be shown in the URI<br>
            Formula Name will be printed on page<br>
            Formula Description just describes the formula<br>
            Formula Sympi will be used to pass to the Python function.
        </h2>
        <form action="{{ route('eqn.store') }}" method="POST">
            @method('POST')
            @csrf
            <input name='id'>ID For URL</input><br>
            <input name='formula_name'>Formula Name</input><br>
            <input name='formula_description'>Formula Description</input><br>
            <input name='formula_sympi'>Formula Sympi</input><br>
            <hr>
            <h1>Variables</h1>
            <h2>Ensure that variable names correspond to the sympi formula variable, and that 
                units correspond to a unit in the "units" database.
            </h2>
            <div id="variablesContainer">
                
            </div>
            <input type="submit">
        </form>

        <button id="addVarButton">Add Variable</button>
        <button id="removeVarButton">Removes Last Added Variable</button>

        <script src="" async defer></script>



        <script>
            $(document).ready(function(){
                $("#addVarButton").click(function(){

                    var prompt = window.prompt("Enter Variable Name as is on Sympi Formula", "variable name");

                    var txt1 = `
                        <div id="${prompt}">
                            <text>${prompt}</text><br> 
                            <input id="unit" name="variable_data[${prompt}][unit]" class="variable">Unit of ${prompt}</input><br> 
                            <input id="sympi_symbol" name="variable_data[${prompt}][sympi_symbol]">Sympi Symbol of ${prompt}</input><br> 
                            <input id="latex_symbol" name="variable_data[${prompt}][latex_symbol]">Latex Symbol of ${prompt}</input><br> 
                            <input id="description"  name="variable_data[${prompt}][description]"> Description of ${prompt}</input>
                        </div>
                        `
                    $("#variablesContainer").append(txt1);          

                });
            });

            $(document).ready(function(){
                $("#removeVarButton").click(function(){
                    $("#variablesContainer").children().last().remove();
                });
            });


        </script>
        @livewireScripts
    </body>
</html>