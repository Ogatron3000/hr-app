<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Employee Info
            'name' => 'required',
            'avatar' => 'image|nullable',
            'birthdate' => 'required|date',
            'national_id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'office' => 'required',
            'notes' => 'nullable',

            // Job Status
            'contract_type_id' => 'required',
            'active_status_id' => 'required',
            'joined' => 'required|date',
            'wage' => 'required',
            'bank_id' => 'required',
            'bank_account' => 'required',

            // Job Description
            'job_name' => 'required',
            'department_id' => 'required',
            'description' => 'required',
            'skills' => 'required',
        ];
    }

    public function splitValidated(): array
    {
        $offsetOne =  array_search("contract_type_id", array_keys($this->validated()), true);
        $offsetTwo =  array_search("job_name", array_keys($this->validated()), true);

        $employeeInfo = array_slice($this->validated(), 0, $offsetOne);
        $jobStatus = array_slice($this->validated(), $offsetOne, $offsetTwo - $offsetOne);
        $jobDescription = array_slice($this->validated(), $offsetTwo);

        return compact('employeeInfo', 'jobStatus', 'jobDescription');
    }
}
