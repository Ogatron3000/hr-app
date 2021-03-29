<x-app-layout>

    <h2 class="my-8 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Employees
    </h2>

    <div class="w-full mb-8 overflow-hidden">
        <div class="w-full overflow-x-auto border dark:border-gray-700 rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Employee</th>
                    <th class="px-4 py-3">Department</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Wage</th>
                    <th class="px-4 py-3">Joined</th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                @foreach($employees as $employee)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div
                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                >
                                    <img
                                        class="object-cover w-full h-full rounded-full"
                                        src="{{ asset($employee->avatar) }}"
                                        alt=""
                                        loading="lazy"
                                    />
                                    <div
                                        class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"
                                    ></div>
                                </div>
                                <div>
                                    <a href="{{ $employee->path() }}" class="font-semibold">{{ $employee->name }}</a>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $employee->jobDescription->job_name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $employee->jobDescription->department->name }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if($employee->jobStatus->activeStatus->name === 'Active')
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $employee->jobStatus->activeStatus->name }}
                                </span>
                            @elseif($employee->jobStatus->activeStatus->name === 'Vacation')
                                <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                    {{ $employee->jobStatus->activeStatus->name }}
                                </span>
                            @elseif($employee->jobStatus->activeStatus->name === 'Sick')
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                    {{ $employee->jobStatus->activeStatus->name }}
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    {{ $employee->jobStatus->activeStatus->name }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            € {{ $employee->jobStatus->wage }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $employee->jobStatus->joined }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $employees->onEachSide(0)->links() }}
        </div>
    </div>
</x-app-layout>
