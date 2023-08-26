## Important Note

This project is currently incomplete. Some missing functionality and other considerations are still under construction. This is a demo version.

## About EzCalcs

EZCalculators.online is a website designed to have a vast range of equations and formulas from topics like Physics, to Chemistry, to Finance. The aim is to have the easiest and most user friendly variable solver on the net. One limitation from similar sites are the lack of freedom in selecting variables/units, poor web design, and a clutter of advertisements. 

## The Backend Overview

The backend is written using [Laravel](https://laravel.com/docs/10.x/readme), a PHP Framework, employing the Model-View-Controller design pattern. On top of Laravel, Laravel [Livewire](https://laravel-livewire.com/docs/2.x/events) is used as the templating engine for rendering components, handling page interactions, AJAX, and has essentially become the "Controller" part of the project. 

Additionally, Python is used to handle the actual "calculators" of the website. Python was chosen because of its access to the powerful symbolic mathematics library [SymPy](https://www.sympy.org/en/index.html). 

Hosting is provided by Hostinger, and uses Linux operating system, specifically Ubuntu 20.04. The database of choice is MariaDB, and server software is Apache. Effectivel, this project leverages the common "LAMP" stack. 

### Backend Software and Libraries

<ul>
    <li>LAMP Stack</li>
    <ul>
        <li>Ubuntu - 20.04</li>
        <li>Apache - 2.4.52</li>
        <li>MariaDB - 10.6.12</li>
        <li>PHP - 8.2.7</li>
    </ul>

    <li>Model-View-Controller</li>
    <ul> 
        <li>Laravel - 10.13.5</li>
        <li>Livewire - v2.12.3</li>
    </ul>

    <li>Python</li>
    <ul>
        <li></li>
    
    </ul>
</ul>



## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
