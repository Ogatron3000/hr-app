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
            'photo' => 'nullable',
            'birthdate' => 'required|date',
            'national_id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'office' => 'required',
            'notes' => 'nullable',

            // Employee Status
            'joined' => 'required|date',
            'wage' => 'required',
            'bank_id' => 'required',
            'bank_account' => 'required'
        ];
    }

    public function splitValidated(): array
    {
        $offset =  array_search("joined", array_keys($this->validated()), true);
        $employeeInfo = array_slice($this->validated(), 0, $offset);
        $employeeStatus = array_slice($this->validated(), $offset);

        return compact('employeeInfo', 'employeeStatus');
    }
}
