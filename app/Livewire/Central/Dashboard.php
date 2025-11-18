<?php

namespace App\Livewire\Central;

use App\Models\Tenant;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.central')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $stores = Tenant::where('owner_id', auth()->id())->get();

        return view('livewire.central.dashboard', [
            'stores' => $stores,
        ]);
    }
}
