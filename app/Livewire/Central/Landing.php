<?php

namespace App\Livewire\Central;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.central')]
#[Title('Create Your Online Store')]
class Landing extends Component
{
    public function render()
    {
        return view('livewire.central.landing');
    }
}
