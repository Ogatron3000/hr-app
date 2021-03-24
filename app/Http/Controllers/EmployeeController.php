<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        // pre-load status and description
        $employee['jobStatus'] = $employee->jobStatus();
        $employee['jobDescription'] = $employee->jobDescription();

        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        $contractTypes = ContractType::all();
        $activeStatuses = ActiveStatus::all();
        $banks = Bank::all();
        $departments = Department::all();

        return view('employees.create', compact('contractTypes', 'activeStatuses', 'banks', 'departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        if (array_key_exists('avatar', $validated['employeeInfo'])) {
            $validated['employeeInfo']['avatar'] = $validated['employeeInfo']['avatar']->store('avatars');
        }

        $employee = Employee::create($validated['employeeInfo']);
        $employee->addJobStatus($validated['jobStatus']);
        $employee->addJobDescription($validated['jobDescription']);

        return redirect($employee->path());
    }

    public function edit(Employee $employee)
    {
        $contractTypes = ContractType::all();
        $activeStatuses = ActiveStatus::all();
        $banks = Bank::all();
        $departments = Department::all();

        // pre-load status and description
        $employee['jobStatus'] = $employee->jobStatus();
        $employee['jobDescription'] = $employee->jobDescription();

        return view('employees.edit', compact('employee', 'contractTypes', 'activeStatuses', 'banks', 'departments'));
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        if (array_key_exists('avatar', $validated['employeeInfo'])) {
            Storage::delete($employee->avatar);
            $validated['employeeInfo']['avatar'] = $validated['employeeInfo']['avatar']->store('avatars');
        }

        $employee->update($validated['employeeInfo']);
        $employee->addJobStatus($validated['jobStatus']);
        $employee->addJobDescription($validated['jobDescription']);

        return redirect($employee->path());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }
}
