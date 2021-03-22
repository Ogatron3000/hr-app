<x-app-layout>
    <div class="w-1/2 px-4 py-3 my-8 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <h3 class="p-6 text-center text-xl">Add Employee</h3>

            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="birthdate" :value="__('Birthdate')" />

                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
            </div>

            <div class="mt-4">
                <x-label for="national_id" :value="__('National ID')" />

                <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id')" required />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="tel" pattern="[0-9]{3}/[0-9]{3}-[0-9]{3,4}" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="office" :value="__('Office')" />

                <x-input id="office" class="block mt-1 w-full" type="text" name="office" :value="old('office')" required />
            </div>

            <div class="mt-4">
                <x-label for="notes" :value="__('Notes')" />

                <textarea
                    id="notes"
                    name="notes"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3"
                >{{ old('notes') }}</textarea>
            </div>

            <div class="flex justify-end">
                <x-button class="mt-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>



    </div>
</x-app-layout>
