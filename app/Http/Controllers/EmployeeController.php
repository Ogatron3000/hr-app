<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
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
        $contractTypes = ContractType::all();
        $activeStatuses = ActiveStatus::all();
        $banks = Bank::all();

        return view('employees.create', compact('contractTypes', 'activeStatuses', 'banks'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        $employee = Employee::create($validated['employeeInfo']);

        $employee->addStatus($validated['employeeStatus']);

        return redirect($employee->path());
    }

    public function edit(Employee $employee)
    {
        $contractTypes = ContractType::all();
        $activeStatuses = ActiveStatus::all();
        $banks = Bank::all();

        // pre-load status
        $employee['status'] = $employee->status();

        return view('employees.edit', compact('employee', 'contractTypes', 'activeStatuses', 'banks'));
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        $employee->update($validated['employeeInfo']);

        $employee->addStatus($validated['employeeStatus']);

        return redirect($employee->path());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }
}
