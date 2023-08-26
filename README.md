## Important Note

This project is currently incomplete. Some missing functionality and other considerations are still under construction. This is a demo version.

## About EzCalcs

EZCalculators.online is a website designed to have a vast range of equations and formulas from topics like Physics, to Chemistry, to Finance. The aim is to have the easiest and most user friendly variable solver on the net. One limitation from similar sites are the lack of freedom in selecting variables/units, poor web design, and a clutter of advertisements. 

## The Backend Overview

The backend is written using [Laravel](https://laravel.com/docs/10.x/readme), a PHP Framework, employing the Model-View-Controller design pattern. On top of Laravel, Laravel [Livewire](https://laravel-livewire.com/docs/2.x/events) is used as the templating engine for rendering components, handling page interactions, AJAX, and has essentially become the "Controller" part of the project. 

Additionally, Python is used to handle the actual "calculators" of the website. Python was chosen because of its access to the powerful symbolic mathematics library [SymPy](https://www.sympy.org/en/index.html). 

Hosting is provided by Hostinger, and uses Linux operating system, specifically Ubuntu 20.04. The database of choice is MariaDB, and server software is Apache. Effectively, this project leverages the common "LAMP" stack. 

### Backend Software and Libraries

<ul>
    <li>LAMP Stack
        <ul>
            <li>Ubuntu - 20.04</li>
            <li>Apache - 2.4.52</li>
            <li>MariaDB - 10.6.12</li>
            <li>PHP - 8.2.7</li>
        </ul>
    </li>

</ul>

<ul>
    <li>Model-View-Controller
        <ul> 
            <li>Laravel - 10.13.5</li>
            <li>Livewire - v2.12.3</li>
        </ul>
    </li>
</ul>

<ul>   
    <li>Python
        <ul>
            <li>Python3 - 3.10.6</li>
            <li>pip - 22.0.2</li>
            <li>SymPy - 1.11.1</li>
            <li>Mpmath - 1.2.1</li>
        </ul>
    </li>
</ul>

## The Frontend Overview

Blade templating/livewire handle most of the client-side rendering logic.

[Bootstrap](https://getbootstrap.com/) is the HTML/CSS styling framework for the entire site. This helps make a fast, responsive, aesthetic, and user friendly frontend.

On top of bootstrap, some custom JQuery is sprinkled throughout the site to handle more customized page interactions and event handling.

Finally, [MathJax](https://docs.mathjax.org/en/v3.2-latest/upgrading/whats-new-3.0.html) is used for LaTeX rendering for equations and other mathematical styling.


### Frontend Software and Libraries
<ul>
    <li>Bootstrap - v5.2.3 </li>
    <li>JQuery - 3.6.3 </li>
    <li>MathJax - v3.0</li>
</ul>

## Site Structure and Logic

### Important Directories

<ul>
    <li>routes/web.php - routing</li>
    <li>app/Models - contains the models for page structure.</li>
    <li>app/Http/Controllers - the controllers to additional routing to and some model interactions.</li>
    <li>app/Http/Controllers/Livewire - the meat and bones of page rendering logic.</li>
    <li>resources/views - the HTML base for all web pages</li>
    <li>resources/views/livewire - the HTML that are rendered by the Livewire Controllers. These are the building blocks for page structure.</li>
    <li>public - contains python code, favicon, and images. </li>
</ul>

### The CalcPage Model

These models define the contents of site pages. The properties are outlined below
<ul>
    <li><strong>id</strong> - the primary key, sets the url. This is usually some version of the formula/equations common name. </li>
    <li><strong>formula_name</strong> - this is the formula name displayed on the page</li>
    <li><strong>formula_description</strong> - a description of the formula to be displayed as information</li>
    <li><strong>formula_sympy</strong> - the formula as to be read by the Python Sympy library. The variable names <strong>must</strong> match the formula to be read correctly.</li>
    <li><strong>topic</strong> - the category that the equation falls into. To be displayed in certain groups like in a sidebar.</li>
    <li>
        <strong>variables_json</strong> - JSON strings containing all the variables/constants of a give equation. Each variable name is a key, and the values are arrays which all contain the following data:
        </li>
    <ul>
            <li>unit - this unit name must correspond to some unit in the "Units" model, as this is where additional logic is created.</li>
            <li>sympy_symbol - A non-latex symbol for calculation purposes </li>
            <li>latex_symbol - Latex symbol for page rendering purposes</li>
            <li>description - a brief description of the variable that is displayed in an informational tab on the calc page</li>
            <li>type - either a constant, variable, or unitless These types set additional page logic</li>
    </ul>
</ul>

### The Unit Model

The unit model is a table with all the units used across the site. This makes it easier to reuse units between pages. For example, a "velocity" equation may use "distance" and "time" units, and a "Work" equation would use "Force" and "distance".

Since these two equations share the "distance" units, its easier to write all possible units of distance to be shared.

The properties are:
<ul>
    <li><strong>id</strong> - The name of the unit, for example, "centimeters".</li>
    <li><strong>unit_class</strong> - for the "centimeters" example, this would fall under "distance" class. The unit_class is accessed across site pages, and must be declared in the calc_pages: variables_json: example_variable: unit:"unit_class".</li>
    <li><strong>base_unit</strong> - in the same example, the base unit would be "meters". So far, this has no use but will be expanded on. </li>
    <li><strong>symbol</strong> - in this example, "cm" would be the symbol. </li>
    <li><strong>conversion_to_base</strong> - in this example, the conversion to meters would be 100cm to 1m. The value then is 0.01, and the value is used in the Python script. More information available in the Sympy Scripts documentation. </li>
    <li><strong>description - a brief description of the unit displayed in each page that uses the unit.</strong></li>
    <li><strong>type</strong> - used to determine additional rendering properties. Currently unused.</li>
</ul>

### Creating Pages - eqn/create

For streamlined creation of web pages, the view 'PageCreator' is used. This view 



