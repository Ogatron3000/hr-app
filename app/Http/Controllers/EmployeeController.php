<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\EmployeeStatus;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated()['employeeInfo']);
        $employeeStatusAttributes = $request->validated()['employeeStatus'];
        $employeeStatusAttributes['employee_id'] = $employee->id;
        $employeeStatus = EmployeeStatus::create($employeeStatusAttributes);

        $employee->addStatus($employeeStatus->id);

        return redirect($employee->path());
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Employee $employee)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'photo' => 'nullable',
            'birthdate' => 'required|date',
            'national_id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'office' => 'required',
            'notes' => 'nullable'
        ]);

        $employee->update($attributes);

        return redirect($employee->path());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }
}
