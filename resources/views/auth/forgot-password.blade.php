<x-guest-layout>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-slot name="image">
            <img
                aria-hidden="true"
                class="object-cover w-full h-full dark:hidden"
                src="{{ asset('img/forgot-password-office.jpeg') }}"
                alt="Office"
            />
        </x-slot>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <x-button>
                {{ __('Email Password Reset Link') }}
            </x-button>

        </form>
    </x-auth-card>
</x-guest-layout>
