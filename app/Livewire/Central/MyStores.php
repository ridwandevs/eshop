<?php

namespace App\Livewire\Central;

use App\Models\Tenant;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Traits\Toast;

#[Layout('layouts.central')]
#[Title('My Stores')]
class MyStores extends Component
{
    use Toast;

    public function deleteStore($tenantId)
    {
        $tenant = Tenant::where('id', $tenantId)
            ->where('owner_id', auth()->id())
            ->first();

        if ($tenant) {
            $tenant->delete();
            $this->success('Store deleted successfully');
        } else {
            $this->error('Store not found');
        }
    }

    public function render()
    {
        $stores = Tenant::where('owner_id', auth()->id())->get();

        return view('livewire.central.my-stores', [
            'stores' => $stores,
        ]);
    }
}
