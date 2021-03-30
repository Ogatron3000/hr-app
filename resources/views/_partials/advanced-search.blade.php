<div x-show="isAdvancedSearchOpen">
    <div class="lg:flex">
        <input
            name="office"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
            type="text"
            placeholder="Office"
        />
        <select
            name="contract_type_id"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        >
            <option value="" disabled selected hidden>Contract type</option>
            @foreach(\App\Models\ContractType::all() as $contractType)
                <option value={{ $contractType->id }}>{{ $contractType->name }}</option>
            @endforeach
        </select>
        <select
            name="active_status_id"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        >
            <option value="" disabled selected hidden>Active status</option>
            @foreach(\App\Models\ActiveStatus::all() as $activeStatus)
                <option value={{ $activeStatus->id }}>{{ $activeStatus->name }}</option>
            @endforeach
        </select>
        <input
            name="wage"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
            type="text"
            placeholder="Wage"
        />
    </div>
    <div class="lg:flex">
        <select
            name="bank_id"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        >
            <option value="" disabled selected hidden>Bank</option>
            @foreach(\App\Models\Bank::all() as $bank)
                <option value={{ $bank->id }}>{{ $bank->name }}</option>
            @endforeach
        </select>
        <input
            name="job_name"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
            type="text"
            placeholder="Job name"
        />
        <select
            name="department_id"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        >
            <option value="" disabled selected hidden>Department</option>
            @foreach(\App\Models\Department::all() as $department)
                <option value={{ $department->id }}>{{ $department->name }}</option>
            @endforeach
        </select>
        <input
            name="skills"
            class="w-full py-2 mr-4 mt-4 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
            type="text"
            placeholder="Skills"
        />
    </div>
</div>
