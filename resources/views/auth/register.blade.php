<x-guest-layout>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-slot name="image">
            <img
                aria-hidden="true"
                class="object-cover w-full h-full"
                src="{{ asset('img/create-account-office.jpeg') }}"
                alt="Office"
            />
        </x-slot>

        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Register
        </h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <x-button class="w-full">
                {{ __('Register') }}
            </x-button>

            <hr class="my-8" />

            <p class="mt-4">
                <a
                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('login') }}"
                >
                    {{ __('Already registered?') }}
                </a>
            </p>
        </form>

    </x-auth-card>
</x-guest-layout>
