<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobStatus;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = $this->searchResults();

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
        $departments = Department::all();

        return view('employees.create', compact('contractTypes', 'activeStatuses', 'banks', 'departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        $employee = DB::transaction(function() use ($validated) {

            if (array_key_exists('avatar', $validated['employeeInfo'])) {
                $validated['employeeInfo']['avatar'] = $validated['employeeInfo']['avatar']->store('avatars');
            }

            $employee = Employee::create($validated['employeeInfo']);
            $employee->addJobStatus($validated['jobStatus']);
            $employee->addJobDescription($validated['jobDescription']);

            return $employee;
        });

        return redirect($employee->path());
    }

    public function edit(Employee $employee)
    {
        $contractTypes = ContractType::all();
        $activeStatuses = ActiveStatus::all();
        $banks = Bank::all();
        $departments = Department::all();

        return view('employees.edit', compact('employee', 'contractTypes', 'activeStatuses', 'banks', 'departments'));
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $validated = $request->splitValidated();

        DB::transaction(function() use ($employee, $validated) {

            if (array_key_exists('avatar', $validated['employeeInfo'])) {
                Storage::delete($employee->avatar);
                $validated['employeeInfo']['avatar'] = $validated['employeeInfo']['avatar']->store('avatars');
            }

            $employee->update($validated['employeeInfo']);
            $employee->addJobStatus($validated['jobStatus']);
            $employee->addJobDescription($validated['jobDescription']);
        });

        return redirect($employee->path());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }

    protected function searchResults(): LengthAwarePaginator
    {
        return Employee::where([
            $this->determineOperator('name'),
            $this->determineOperator('office'),
        ])
            ->whereHas('jobStatuses', function ($q) {
                $q->where([
                    $this->determineOperator('contract_type_id'),
                    $this->determineOperator('active_status_id'),
                    $this->determineOperator('wage'),
                    $this->determineOperator('bank_id'),
                ]);
            })
            ->whereHas('jobDescriptions', function ($q) {
                $q->where([
                    $this->determineOperator('job_name'),
                    $this->determineOperator('department_id'),
                    $this->determineOperator('skills'),
                ]);
            })
            ->with('jobStatuses.contractType',
                'jobStatuses.activeStatus',
                'jobStatuses.bank',
                'jobDescriptions.department')
            ->paginate(10);
    }

    protected function determineOperator($val): array
    {
        if (str_ends_with($val, 'id') && request()->query($val)) {
            return [$val, '=', request()->query($val)];
        }

        return [$val, 'like', '%' . request()->query($val) . '%'];
    }
}
