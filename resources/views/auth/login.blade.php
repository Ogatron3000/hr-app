<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-slot name="image">
            <img
                aria-hidden="true"
                class="object-cover w-full h-full"
                src="{{ asset('img/login-office.jpeg') }}"
                alt="Office"
            />
        </x-slot>

        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Login
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input type="checkbox" class="border border-gray-300 rounded text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <x-button>
                {{ __('Log in') }}
            </x-button>

            <hr class="my-8" />

            <p class="mt-4">
                <a
                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('password.request') }}"
                >
                    Forgot your password?
                </a>
            </p>
            <p class="mt-1">
                <a
                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('register') }}"
                >
                    Create account
                </a>
            </p>

        </form>
    </x-auth-card>
</x-guest-layout>
