<x-app-layout>
    <div>
        <div class="flex">
            {{-- Controls --}}
            <div class="flex w-1/3">
                <a href="{{ $employee->path() . '/edit' }}">
                    <x-button class="mr-2">Edit</x-button>
                </a>
                <form method="POST" action="{{ $employee->path() }}">
                    @method('DELETE')
                    @csrf
                    <x-button>Delete</x-button>
                </form>
            </div>

            {{-- Employee Info --}}
            <div class="flex flex-col w-1/3 p-4 my-6 mr-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Employee Info
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Name</p> <p class="mt-1">{{ $employee->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Birthdate</p> <p class="mt-1">{{ $employee->birthdate }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">ID</p> <p class="mt-1">{{ $employee->national_id }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Address</p> <p class="mt-1">{{ $employee->address }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Notes</p><p class="mt-1">{{ $employee->notes }}</p></div>
                </div>
            </div>

            {{-- Employee Contact --}}
            <div class="flex flex-col w-1/3 p-4 my-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Contact Info
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Email</p> <p class="mt-1">{{ $employee->email }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Phone</p> <p class="mt-1">{{ $employee->phone }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Office</p> <p class="mt-1">{{ $employee->office }}</p></div>
                </div>
            </div>
        </div>

        <div class="flex">
            {{-- Employee Status --}}
            <div class="flex flex-col w-1/2 p-4 my-6 mr-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Job Status
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Contract type</p> <p class="mt-1">{{ $employee->jobStatus->contractType->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Active status</p> <p class="mt-1">{{ $employee->jobStatus->activeStatus->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Date Joined</p> <p class="mt-1">{{ $employee->jobStatus->joined }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Wage</p> <p class="mt-1">{{ $employee->jobStatus->wage }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Bank</p> <p class="mt-1">{{ $employee->jobStatus->bank->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Bank Account</p> <p class="mt-1">{{ $employee->jobStatus->bank_account }}</p></div>
                </div>
            </div>

            <div class="flex flex-col w-1/2 p-4 my-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Job Description
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Job name</p> <p class="mt-1">{{ $employee->jobDescription->job_name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Department</p> <p class="mt-1">{{ $employee->jobDescription->department->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Description</p> <p class="mt-1">{{ $employee->jobDescription->description }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Skills</p> <p class="mt-1">{{ $employee->jobDescription->skills }}</p></div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
