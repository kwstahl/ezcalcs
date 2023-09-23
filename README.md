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


## Important Directories

<ul>
    <li>routes/web.php - routing</li>
    <li>app/Models - contains the models for page structure.</li>
    <li>app/Http/Controllers - the controllers to additional routing to and some model interactions.</li>
    <li>app/Http/Controllers/Livewire - the meat and bones of page rendering logic.</li>
    <li>resources/views - the HTML base for all web pages</li>
    <li>resources/views/livewire - the HTML that are rendered by the Livewire Controllers. These are the building blocks for page structure.</li>
    <li>public - contains python code, favicon, and images. </li>
</ul>

## The CalcPage Model

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

## The Unit Model

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

## Creating Pages - eqn/create

Generating models, and pages is a breeze with the eqn/create route, which calls the PageCreator view. The PageCreator view is built by the calc-page-update, and calc-page-create components.

### calc-page-update

This component works pulling all the models in calc_pages as a collection, looping through each model, and displaying its attributes as editable text (input fields that are modeled by wire:model). This is done by a foreach blade directive on the $calcPages property, indexed by the model's index.

<strong>variables_json and $variablesWithPageId</strong> - Unfortunately, the indexing and looping of the $calcPages attribute is not strong enough to handle the variables_json attribute, since it is an array of arrays. To solve this, the $variablesWithPageId property is declared as a collection for each calc_page model. The calc_page model's id is assigned to its corresponding variables_json collection, allowing for a way to properly access it with a blade directive. The blade directive finds the $variablesWithPageId collection by using the id of the model at that current loop, then loops through each variable.

<strong>save and deletePage</strong> - Once changes are done being made, the save function will loop through each model and save whatever is bound to the inputs for each attribute. The variables_json attribute is easily saved by the get method on $variablesWithPageId, passing in the page id to correctly pull it.

### calc-page-create

This component works similarly to calc-page-update, but special care is taken to bridge the HTML and Livewire gaps in creating variables_json attributes for new page models.

<strong>$numberOfVariables</strong> is an integer property bound to the counter. The number on the counter sets the number of input groups. These input groups are the multiple formula variables, and their attributes.

<strong>$variableCollections</strong> is a collection which the input groups are bound to. Each input group has a special "variable_name". This is the key name for its specific input group.

<strong>prepVariableCollectionsForModel()</strong> is a helper function that sets the "variable_name" as the key to its corresponding input group. The other inputs in the group are the attributes expected in a variables_json property of a calc_page model. The variable_name itself is unset in this function, since it is not used in the calc_page model.

<strong>create</strong> - Finally, all inputs are validated, a new page model is created, and the attributes are set. 

## Calculator Pages

Calculator Pages are where calc_page models come together and make up the various pages.

The 'CalcPageView' view is the base where smaller livewire components live. The correct view is set by the CalcController controller by the 'id' attribute of the calc_page model retrieved. The controller also imports the model attributes for access by the page and livewire components.

The livewire components are as follows:

<ul>
    <li><strong>site-head</strong> - Contains bootstrap CDN, Mathjax CDN, scripts, css, and other important links. </li>
    <li><strong>sidebar</strong> - Contains an offcanvas sidebar that is hidden on smaller screens. The contents are made up from all existing models, and organized by the 'topics' attribute of the calc_pages models.</li>
    <li><strong>page-form</strong></li> - Creates the form on each page, more information is detailed in the next subsection.
    <li><strong>information</strong> - Displays information for the formula and all the variables. This is pulled from the formula_description attribute, and in variables_json>descriptions attributes.</li>
</ul>

### page-form component

The page form component is the most important part of the web page. This handles user inputs, sends them to the SympyScript Python file for handling, and returns a calculated answer.

#### Properties

<ul>
    <li><strong>units</strong> - all the units retrieved from the Unit model.</li>
    <li><strong>unitOptions</strong> - this property is set by the setUnitOptionsForEachVariable method. It is a collection of collections: the key is the variable's name, and the value is a collection of all symbols/conversions retrieved from the Unit model. More details outlined on the method.</li>
    <li><strong>variables_json</strong> - the variables_json property is the variables_json retrieved from the model as a collection instance. </li>
    <li><strong>variableInputData</strong> - a collection that contains each variable's value, and the variable's selected unit. These are selected from the page form.</li>
    <li><strong>variableToSolveFor</strong> - the name of the variable selected from the radio input. </li>
    <li><strong>answer</strong> - the calculated answer returned by the Python SympyScript.</li>
    <li><strong>messages</strong> - error messages displayed during form validation.</li>
</ul>

#### Methods

<ul>
    <li><strong>mount()</strong> - called on page load. Sets empty properties; variableToSolveFor - is set as the first variable as default; calls setVariableInputData(), and setUnitOptionsForEachVariable(). </li>
    <li><strong>setVariableInputData()</strong> - for each variable, the sympy_symbol is added as an attribute, this is used to handle the formula-variable relationship. Each variable also gets a null Value, and a null unit_conversion.</li>
    <li><strong>setUnitOptionsForEachVariable()</strong> - for each variable, a list of units related by the variable's 'unit' attribute, and the Unit model's 'unit_class' attribute are created; these populate the dropdown list in the form. The 'symbol' attribute makes the displayed text in the HTML option element, and the 'conversion_to_base' is the value when selected.</li>
    <li><strong>updatedVariableToSolveFor()</strong> - on any update of the radio button selection, the variableInputData property must be updated. The Value of whatever variable was selected before is cleared, and the rules() method is called again to reflect the changes. The method updates the entire collection with a cleared 'Value' because of Laravel's collection class being immutable. Direct changes to 'Value' are not allowed, so this is a workaround.</li>
    <li><strong>submit()</strong> - on form submission, form data is validated and the following methods are called: 
    <ul>
        <li>prepareDataForSympyInJson() - this method prepares all variableInputData in a way that can be parsed by the Python SympyScript logic.
        </li>
        <li>sendDataToSympy - uses the Laravel Process facade and sends a command to SympyScript with the prepared JSON data, the formula_sympy retrieved from the model, and outputs the calculated value/variable.</li> 
    </ul></li>
</ul>