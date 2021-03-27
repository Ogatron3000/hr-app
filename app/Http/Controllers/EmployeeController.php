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

        $employee = DB::transaction(function() use ($validated) {
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

        DB::transaction(function() use ($employee, $validated) {
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
        $employees = Employee::where([
            $this->searchHelper('name'),
            $this->searchHelper('office'),
        ])
            ->whereHas('jobStatusHistory', function ($q) {
                $q->where([
                    $this->searchHelper('contract_type_id'),
                    $this->searchHelper('active_status_id'),
                    $this->searchHelper('wage'),
                    $this->searchHelper('bank_id'),
                ]);
            })
            ->whereHas('jobDescriptionHistory', function ($q) {
                $q->where([
                    $this->searchHelper('job_name'),
                    $this->searchHelper('department_id'),
                    $this->searchHelper('skills'),
                ]);
            })
            ->paginate(10);

         return count($employees) ? $employees : Employee::paginate(10);
    }

    protected function searchHelper($val): array
    {
        if (str_ends_with($val, 'id') && request()->query($val)) {
            return [$val, '=', request()->query($val)];
        }

        return [$val, 'like', '%' . request()->query($val) . '%'];
    }
}
