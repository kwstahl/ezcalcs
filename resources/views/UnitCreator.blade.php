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
        <h1>Formula Data</h1>
        <h2>
            ID corresponds to the ID that will queried for the unit. Use the unit's name, like 'velocity'<br>
            base corresponds to the base unit to be checked, like 'm/s'<br>
            base_breakdown is the most elementary breakdown of the unit. all the way down to the base units, in a formula fashion.<br>
            symbol is just the symbol of the unit <br>
            json_units are all the units to be added. <br>
            Each unit to be added should have the following structure:
            <ul>
                <li>name</li>
                <li>conversion_factor</li>
                <li>description</li>
            </ul>

        </h2>
    <form>
        <input type="text">id</input><br>
        <input type="text">base</input><br>
        <input type="text">base_breakdown</input><br>
        <input type = "text">symbol</input><br>
        <input type="text">json_units</input><br>
        <div id="unitContainer">

        </div>
        <input type="submit">

    </form>
    <button id = "addUnitButton"></button>
    <button id = "removeUnitButton"></button>



        <script src="" async defer></script>
        
        <script>
            $("#addUnitButton").click(function(){

                var prompt = window.prompt("Enter unit name");

                var txt1 = `
                    <div id="${prompt}">
                        <text>${prompt}</text><br> 
                        <input id="unit" name="${prompt}">Conversion factor of ${prompt}</input><br> 
                    </div>
                    `
                $("#unitContainer").append(txt1);          

            });

            $(document).ready(function(){
                $("#removeUnitButton").click(function(){
                    $("#unitContainer").children().last().remove();
                });
            });
        </script>
        </script>
        @livewireScripts
    </body>

</html>