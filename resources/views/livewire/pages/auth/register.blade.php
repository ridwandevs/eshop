<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Create an account</h2>
        <p class="text-sm text-slate-600 mt-1">Get started with your free account</p>
    </div>

    <form wire:submit="register" class="space-y-4">
        <!-- Name -->
        <div>
            <x-ui.label for="name" value="Name" required />
            <x-ui.input wire:model="name" id="name" class="mt-1" type="text" name="name" required autofocus autocomplete="name" />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <x-ui.label for="email" value="Email" required />
            <x-ui.input wire:model="email" id="email" class="mt-1" type="email" name="email" required autocomplete="username" />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <x-ui.label for="password" value="Password" required />
            <x-ui.input wire:model="password" id="password" class="mt-1" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <x-ui.label for="password_confirmation" value="Confirm Password" required />
            <x-ui.input wire:model="password_confirmation" id="password_confirmation" class="mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col items-center gap-4 pt-2">
            <x-ui.button type="submit" class="w-full">
                Register
            </x-ui.button>
        </div>

        <div class="mt-6 text-center text-sm text-slate-600">
            Already have an account?
            <a href="{{ route('login') }}" wire:navigate class="font-medium text-slate-900 hover:text-slate-700 transition-colors">
                Sign in
            </a>
        </div>
    </form>
</div>
