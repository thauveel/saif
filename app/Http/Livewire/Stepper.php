<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Stepper extends Component
{
    public $current_step = 0 , $total_steps;
    
    public function render()
    {
        return view('livewire.stepper');
    }
}
