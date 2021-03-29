<x-app-layout>
    <div>
        <div class="flex">

            <div class="flex flex-col w-1/3 p-4 my-2 mr-6 dark:text-gray-400">

                {{-- Controls --}}
                <div class="flex justify-end">
                    <div>
                        <a href="{{ $employee->path() . '/documents' }}">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-300 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Documents"
                            >
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                    <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div>
                        <a href="{{ $employee->path() . '/history' }}">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-300 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Documents"
                            >
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div>
                        <a href="{{ $employee->path() . '/edit' }}">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-300 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit"
                            >
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div>
                        <form method="POST" action="{{ $employee->path() }}">
                            @method('DELETE')
                            @csrf
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-300 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete"
                            >
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Avatar --}}
                <div class="relative hidden w-40 h-40 mt-4 mx-auto rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full"
                         src="{{ asset($employee->avatar) }}"
                         alt=""
                         loading="lazy"/>
                    <div class="absolute inset-0 rounded-full shadow-inner"
                         aria-hidden="true"></div>
                </div>

                {{-- Short Info --}}
                <div class="flex-1 text-center p-4">
                    <p class="text-xl font-semibold">{{ $employee->name }}</p>
                    <p class="text-md my-3">{{ $employee->jobDescription->job_name }}</p>
                    <p class="italic text-sm">{{ $employee->notes ??  'Little is known about this employee, but we can safely assume he/she likes pina coladas and long walks on the beach.'}}</p>
                </div>
            </div>

            {{-- Employee Info --}}
            <div class="flex flex-col w-1/3 p-4 my-6 mr-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
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
                <div class="mt-4">
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Name</p> <p class="mt-1">{{ $employee->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Birthdate</p> <p class="mt-1">{{ $employee->birthdate }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">ID</p> <p class="mt-1">{{ $employee->national_id }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Address</p> <p class="mt-1">{{ $employee->address }}</p></div>
                </div>
            </div>

            {{-- Employee Contact --}}
            <div class="flex flex-col w-1/3 p-4 my-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
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
