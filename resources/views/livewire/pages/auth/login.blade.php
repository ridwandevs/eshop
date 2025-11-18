<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Welcome back</h2>
        <p class="text-sm text-slate-600 mt-1">Sign in to your account to continue</p>
    </div>

    <!-- Session Status -->
    @if(session('status'))
        <div class="mb-4 p-3 rounded-md bg-slate-100 border border-slate-200">
            <p class="text-sm text-slate-700">{{ session('status') }}</p>
        </div>
    @endif

    <form wire:submit="login" class="space-y-4">
        <!-- Email Address -->
        <div>
            <x-ui.label for="email" value="Email" required />
            <x-ui.input wire:model="form.email" id="email" class="mt-1" type="email" name="email" required autofocus autocomplete="username" />
            @error('form.email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <x-ui.label for="password" value="Password" required />
            <x-ui.input wire:model="form.password" id="password" class="mt-1" type="password" name="password" required autocomplete="current-password" />
            @error('form.password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <x-ui.checkbox wire:model="form.remember" id="remember" name="remember" />
            <label for="remember" class="ml-2 text-sm text-slate-600">Remember me</label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
            @if (Route::has('password.request'))
                <a class="text-sm text-slate-600 hover:text-slate-900 transition-colors" href="{{ route('password.request') }}" wire:navigate>
                    Forgot your password?
                </a>
            @endif

            <x-ui.button type="submit" class="w-full sm:w-auto">
                Log in
            </x-ui.button>
        </div>

        <div class="mt-6 text-center text-sm text-slate-600">
            Don't have an account?
            <a href="{{ route('register') }}" wire:navigate class="font-medium text-slate-900 hover:text-slate-700 transition-colors">
                Sign up
            </a>
        </div>
    </form>
</div>
