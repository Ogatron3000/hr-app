<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'employeeInfo.name' => 'required',
            'employeeInfo.photo' => 'nullable',
            'employeeInfo.birthdate' => 'required|date',
            'employeeInfo.national_id' => 'required',
            'employeeInfo.address' => 'required',
            'employeeInfo.email' => 'required|email',
            'employeeInfo.phone' => 'required',
            'employeeInfo.office' => 'required',
            'employeeInfo.notes' => 'nullable',

            // Employee Status
            'employeeStatus.joined' => 'required|date',
            'employeeStatus.wage' => 'required',
            'employeeStatus.bank_id' => 'required',
            'employeeStatus.bank_account' => 'required'
        ];
    }
}
