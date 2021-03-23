<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Bank;
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
        $banks = Bank::all();

        return view('employees.create', compact('banks'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        $offset =  array_search("joined", array_keys($validated), true);
        $employee = Employee::create(array_slice($validated, 0, $offset));

        $employee->addStatus(array_slice($request->validated(), $offset));

        return redirect($employee->path());
    }

    public function edit(Employee $employee)
    {
        $banks = Bank::all();

        // pre-load status
        $employee['status'] = $employee->status();

        return view('employees.edit', compact('employee', 'banks'));
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $validated = $request->validated();
        $offset =  array_search("joined", array_keys($validated), true);
        $employee->update(array_slice($request->validated(), 0, $offset));

        $employee->addStatus(array_slice($request->validated(), $offset));

        return redirect($employee->path());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }
}
