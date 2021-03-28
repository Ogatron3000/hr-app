<x-app-layout>
    <div class="w-1/2 p-4 my-8 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

        <h2 class="text-lg text-center p-4">Add Document</h2>

        <form method="POST" action="{{ $employee->path() . '/documents' }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="date" :value="__('Date')" />

                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
            </div>

            <div class="mt-4">
                <x-label for="expiry" :value="__('Expiry')" />

                <x-input id="expiry" class="block mt-1 w-full" type="date" name="expiry" :value="old('expiry')" required />
            </div>

            <div class="mt-4">
                <x-label for="file" :value="__('File')" />

                <x-input id="file" class="block mt-1 w-full" type="file" name="file" />
            </div>

            <div class="flex justify-end">
                <x-button class="mt-4">
                    {{ __('Submit') }}
                </x-button>
            </div>

        </form>

    </div>
</x-app-layout>
