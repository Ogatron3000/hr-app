<x-app-layout>
    <div class="flex flex-col p-4 mt-6 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="flex items-center">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
            </div>
            <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
                Employee Info
            </p>
        </div>
        <div class="mt-4">
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Name</p> <p class="mt-1">{{ $employee->name }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Birthdate</p> <p class="mt-1">{{ $employee->birthdate }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">ID</p> <p class="mt-1">{{ $employee->national_id }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Address</p> <p class="mt-1">{{ $employee->address }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Email</p> <p class="mt-1">{{ $employee->email }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Phone</p> <p class="mt-1">{{ $employee->phone }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Office</p> <p class="mt-1">{{ $employee->office }}</p></div>
            <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Notes</p><p class="mt-1">{{ $employee->notes }}</p></div>
        </div>
    </div>
</x-app-layout>
