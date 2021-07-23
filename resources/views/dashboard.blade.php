<x-app-layout>

    {{-- Greeting --}}
    <h2 class="my-8 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Welcome, {{ auth()->user()->name }}
    </h2>

    {{-- CTA --}}
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
    >
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clipRule="evenodd" />
            </svg>
            <span>There are {{ count($docsThatExpireSoon) }} contracts that expire soon</span>
        </div>
    </div>


    <h3 class="my-4 text-lg font-semibold text-gray-700 dark:text-gray-200">
        Statistics
    </h3>

    {{-- Cards --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Employees
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $employeeCount }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Wage expenses
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    $ {{ $wageExpenses }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
            >
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Departments
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $departmentCount }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
            >
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                    <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Documents
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $documentCount }}
                </p>
            </div>
        </div>
    </div>


    <h3 class="my-4 text-lg font-semibold text-gray-700 dark:text-gray-200">
        Documents
    </h3>

    {{-- Table --}}
    <div class="w-full mb-8 overflow-hidden">
        <div class="w-full overflow-x-auto border dark:border-gray-700 rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Employee</th>
                    <th class="px-4 py-3">Document</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Expiry</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                @foreach($docsThatExpireSoon as $document)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div
                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                >
                                    <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="{{ $document->employee->avatarUrl($document->employee->avatar) }}"
                                        alt=""
                                        loading="lazy"
                                    />
                                    <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                    ></div>
                                </div>
                                <div>
                                    <a href="{{ $document->employee->path() }}" class="font-semibold">{{ $document->employee->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            {{ $document->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $document->date }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                              {{ $document->expiry }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center">
                                <a href="{{ $document->path() }}">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Download"
                                    >
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </a>
                                <div>
                                    <form method="POST" action="{{ $document->path() }}">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $docsThatExpireSoon->onEachSide(0)->links() }}
        </div>
    </div>
</x-app-layout>
