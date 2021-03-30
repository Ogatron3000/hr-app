<x-app-layout>

    <h2 class="my-8 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit employee
    </h2>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="mb-8">
        <form method="POST" action="{{ $employee->path() }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="flex">

                {{-- Employee Info --}}
                <div class="w-1/2 px-4 py-3 mr-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div class="flex items-center my-4">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Employee Info
                        </p>
                    </div>

                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$employee->name" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="birthdate" :value="__('Birthdate')" />

                        <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="$employee->birthdate" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="national_id" :value="__('National ID')" />

                        <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="$employee->national_id" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="address" :value="__('Address')" />

                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$employee->address" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="avatar" :value="__('Avatar')" />

                        <div class="flex items-center">
                            <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />

                            {{-- Avatar --}}
                            <div class="relative hidden w-10 h-10 ml-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                     src="{{ asset($employee->avatar) }}"
                                     alt=""
                                     loading="lazy"/>
                                <div class="absolute inset-0 rounded-full shadow-inner"
                                     aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-label for="notes" :value="__('Notes')" />

                        <textarea
                            id="notes"
                            name="notes"
                            class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3"
                        >{{ $employee->notes }}</textarea>
                    </div>
                </div>

                {{-- Employee Contact --}}
                <div class="w-1/2 px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div class="flex items-center my-4">
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Contact Info
                        </p>
                    </div>

                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$employee->email" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="phone" :value="__('Phone')" />

                        <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="$employee->phone" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="cellphone" :value="__('Cellphone')" />

                        <x-input id="cellphone" class="block mt-1 w-full" type="tel" name="cellphone" :value="$employee->Cellphone" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="office" :value="__('Office')" />

                        <x-input id="office" class="block mt-1 w-full" type="text" name="office" :value="$employee->office" required />
                    </div>
                </div>
            </div>

            <div class="flex mt-8">

                {{-- Job Status --}}
                <div class="w-1/2 px-4 py-3 mr-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div class="flex items-center my-4">
                        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Job Status
                        </p>
                    </div>

                    <div>
                        <x-label for="contract_type_id" :value="__('Contract type')" />

                        <select id="contract_type_id" name="contract_type_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($contractTypes as $contractType)
                                <option {{ $contractType === $employee->jobStatus->contractType ? 'selected' : '' }} value={{ $contractType->id }}>{{ $contractType->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="active_status_id" :value="__('Active status')" />

                        <select id="active_status_id" name="active_status_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($activeStatuses as $activeStatus)
                                <option {{ $activeStatus === $employee->jobStatus->activeStatus ? 'selected' : '' }} value={{ $activeStatus->id }}>{{ $activeStatus->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="joined" :value="__('Joined')" />

                        <x-input id="joined" class="block mt-1 w-full" type="date" name="joined" :value="$employee->jobStatus->joined" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="wage" :value="__('Wage')" />

                        <x-input id="wage" class="block mt-1 w-full" type="text" name="wage" :value="$employee->jobStatus->wage" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="bank_id" :value="__('Bank')" />

                        <select id="bank_id" name="bank_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($banks as $bank)
                                <option {{ $bank === $employee->jobStatus->bank ?? 'selected' }} value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="bank_account" :value="__('Bank account')" />

                        <x-input id="bank_account" class="block mt-1 w-full" type="dropdown" name="bank_account" :value="$employee->jobStatus->bank_account" required />
                    </div>
                </div>

                {{-- Job Description --}}
                <div class="w-1/2 px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div class="flex items-center my-4">
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

                    <div>
                        <x-label for="job_name" :value="__('Job name')" />

                        <x-input id="job_name" class="block mt-1 w-full" type="text" name="job_name" :value="$employee->jobDescription->job_name" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="department_id" :value="__('Department')" />

                        <select id="department_id" name="department_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($departments as $department)
                                <option {{ $department === $employee->jobDescription->department ? 'selected' : '' }} value={{ $department->id }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="description" :value="__('Description')" />

                        <textarea
                            id="description"
                            name="description"
                            class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3"
                        >{{ $employee->jobDescription->description }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-label for="skills" :value="__('Skills')" />

                        <textarea
                            id="skills"
                            name="skills"
                            class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3"
                        >{{ $employee->jobDescription->skills }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ $employee->path() . '/edit' }}">
                    <x-button class="mt-4">Submit</x-button>
                </a>
            </div>
        </form>
    </div>


</x-app-layout>
