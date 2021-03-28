<x-app-layout>
    <div class="flex mt-6">

        {{-- Employee Status History --}}
        <div class="w-1/2 mr-12">
            <div class="flex items-center justify-center">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Job Status History
                </p>
            </div>
            @foreach($jobStatusHistory as $jobStatus)
                <h3 class="p-4 text-gray-500">
                    {{ $jobStatus->created_at->diffForHumans() }}
                </h3>
                <div class="p-4 mb-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                        <div class="p-2"><p class="text-xs font-semibold uppercase">Contract type</p> <p class="mt-1">{{ $jobStatus->contractType->name }}</p></div>
                        <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Active status</p> <p class="mt-1">{{ $jobStatus->activeStatus->name }}</p></div>
                        <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Date Joined</p> <p class="mt-1">{{ $jobStatus->joined }}</p></div>
                        <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Wage</p> <p class="mt-1">{{ $jobStatus->wage }}</p></div>
                        <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Bank</p> <p class="mt-1">{{ $jobStatus->bank->name }}</p></div>
                        <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Bank Account</p> <p class="mt-1">{{ $jobStatus->bank_account }}</p></div>
                </div>
            @endforeach
        </div>

        {{-- Employee Description History --}}
        <div class="w-1/2">
            <div class="flex items-center justify-center">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                    </svg>
                </div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Job Description History
                </p>
            </div>
            @foreach($jobDescriptionHistory as $jobDescription)
                <h3 class="p-4 text-gray-500">
                    {{ $jobDescription->created_at->diffForHumans() }}
                </h3>
                <div class="p-4 mb-6 bg-white rounded-lg shadow-xs dark:bg-gray-800 dark:text-gray-400 shadow">
                    <div class="p-2"><p class="text-xs font-semibold uppercase">Job name</p> <p class="mt-1">{{ $jobDescription->job_name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Department</p> <p class="mt-1">{{ $jobDescription->department->name }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Description</p> <p class="mt-1">{{ $jobDescription->description }}</p></div>
                    <div class="border-t p-2"><p class="text-xs font-semibold uppercase">Skills</p> <p class="mt-1">{{ $jobDescription->skills }}</p></div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
