<x-app-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="my-8">
        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="flex">

                 {{--Employee Info--}}
                <div class="w-1/2 px-4 py-3 mr-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
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
                        <x-label for="avatar" :value="__('Avatar')" />

                        <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
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
                </div>

                 {{--Employee Contact--}}
                <div class="w-1/2 px-4 py-3 mr-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
                    <div>
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
                </div>
            </div>

            <div class="flex mt-8">

                {{-- Job Status --}}
                <div class="w-1/2 px-4 py-3 mr-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div>
                        <x-label for="contract_type_id" :value="__('Contract type')" />

                        <select id="contract_type_id" name="contract_type_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($contractTypes as $contractType)
                                <option {{ $contractType->id == old('contract_type_id') ? 'selected' : '' }} value={{ $contractType->id }}>{{ $contractType->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="active_status_id" :value="__('Active status')" />

                        <select id="active_status_id" name="active_status_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($activeStatuses as $activeStatus)
                                <option {{ $activeStatus->id == old('active_status_id') ? 'selected' : '' }} value={{ $activeStatus->id }}>{{ $activeStatus->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="joined" :value="__('Joined')" />

                        <x-input id="joined" class="block mt-1 w-full" type="date" name="joined" :value="old('joined')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="wage" :value="__('Wage')" />

                        <x-input id="wage" class="block mt-1 w-full" type="text" name="wage" :value="old('wage')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="bank_id" :value="__('Bank')" />

                        <select id="bank_id" name="bank_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($banks as $bank)
                                <option {{ $bank->id == old('bank_id') ? 'selected' : '' }} value={{ $bank->id }}>{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="bank_account" :value="__('Bank account')" />

                        <x-input id="bank_account" class="block mt-1 w-full" type="dropdown" name="bank_account" :value="old('bank_account')" required />
                    </div>
                </div>

                {{-- Job Description --}}
                <div class="w-1/2 px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">

                    <div>
                        <x-label for="job_name" :value="__('Job name')" />

                        <x-input id="job_name" class="block mt-1 w-full" type="text" name="job_name" :value="old('job_name')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="department_id" :value="__('Department')" />

                        <select id="department_id" name="department_id" class="block w-full mt-1 text-sm border border-gray-300 rounded dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach($departments as $department)
                                <option {{ $department->id == old('department_id') ? 'selected' : '' }} value={{ $department->id }}>{{ $department->name }}</option>
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
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-label for="skills" :value="__('Skills')" />

                        <textarea
                            id="skills"
                            name="skills"
                            class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3"
                        >{{ old('skills') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <x-button class="mt-4">
                    {{ __('Submit') }}
                </x-button>
            </div>

        </form>
    </div>
</x-app-layout>
