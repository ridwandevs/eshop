<?php

namespace App\Livewire\Central;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Traits\Toast;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.central')]
#[Title('Register Your Store')]
class RegisterStore extends Component
{
    use Toast;

    #[Validate('required|min:3|max:50')]
    public $store_name = '';

    #[Validate('required|min:3|max:20|regex:/^[a-z0-9-]+$/|unique:tenants,subdomain')]
    public $subdomain = '';

    #[Validate('required|min:3')]
    public $owner_name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('required|same:password')]
    public $password_confirmation = '';

    public $subdomain_available = null;

    public function updatedSubdomain()
    {
        $this->subdomain = Str::slug($this->subdomain);

        if (strlen($this->subdomain) >= 3) {
            $this->subdomain_available = Tenant::isSubdomainAvailable($this->subdomain);
        } else {
            $this->subdomain_available = null;
        }
    }

    public function updatedStoreName()
    {
        if (empty($this->subdomain)) {
            $this->subdomain = Str::slug($this->store_name);
            $this->updatedSubdomain();
        }
    }

    public function register()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Create central user (store owner)
            $user = User::create([
                'name' => $this->owner_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Create tenant
            $tenant = Tenant::create([
                'id' => $this->subdomain,
                'subdomain' => $this->subdomain,
                'owner_id' => $user->id,
            ]);

            // Create domain for tenant
            $tenant->domains()->create([
                'domain' => $this->subdomain . '.' . str_replace(['http://', 'https://'], '', config('app.url')),
            ]);

            // Store the store name in tenant data
            $tenant->update([
                'data' => [
                    'name' => $this->store_name,
                ],
            ]);

            DB::commit();

            // Log in the user
            auth()->login($user);

            $this->success('Store created successfully!');

            // Redirect to dashboard
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Failed to create store: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.central.register-store');
    }
}
