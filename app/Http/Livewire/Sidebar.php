<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return <<<'blade'
        <div class="col-lg-2 col-md-3 col-sm-3 col-xl-2 ">
        <div class="accordion" id="accordionExample">

            <!-- Physics Group -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">Physics</button>
                </h2>

                <div id="collapseOne" class="accorion-collapse collapse show" data-bs-parent="#accordion">
                    <div class="accordion-body p-1">
                        <ul class="list-unstyled w-100 m-0">
                            <li class="listElements"><a href="#" class="d-block w-100 h-100 bg-light text-dark p-1">Velocity</a></li>
                            <li class="listElements"><a href="#" class="d-block w-100 h-100 bg-light text-dark p-1">Force</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Chemistry</button>
                </h2>

                <div id="collapseTwo" class="accorion-collapse collapse show" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="#">Henry's Law</a></li>
                            <li><a href="#">Partial Pressure</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>        
        </div>
        blade;
    }
}
