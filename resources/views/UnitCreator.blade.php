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
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <form action = "{{ route('unit.store') }}" method = "POST">
        @method('POST')
        @csrf
        <input type="text" name="id">id</input><br>
        <input type="text" name="base_unit">base</input><br>
        <input type="text" name="conversion_to_base">base_breakdown</input><br>
        <input type ="text" name="description">description</input><br>
        <input type="text" name="unit_class">unit_class</input><br>
        <input type="text" name="symbol">symbol</input><br>
        <input type="submit">
    </form>

        @livewire('unit-table')


        <script src="" async defer></script>
    
        </script>
        @livewireScripts
    </body>

</html>