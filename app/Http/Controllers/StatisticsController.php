<?php

namespace App\Http\Controllers;

use App\Models\ActiveStatus;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobStatus;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // count
        $employeeCount = Employee::count();

        // avg age
        // $averageAge = number_format(Employee::selectRaw('AVG(DATEDIFF(NOW(), birthdate)/365) as avg')->first()->avg, 2);

        // Hardcode until MySQL is set up on Heroku
        $averageAge = 25;

        // avg wage
        $averageWage = number_format(JobStatus::average('wage'), 2);

        // avg exp
        // $averageExp = number_format(JobStatus::selectRaw('AVG(DATEDIFF(NOW(), joined)/365) as avg')->first()->avg, 2);

        // Hardcode until MySQL is set up on Heroku
        $averageExp = 5;

        return view('statistics', compact('employeeCount', 'averageAge', 'averageWage', 'averageExp'));
    }

    public function api()
    {
        $employeesPerDepartment = Department::select('name')->withCount('jobDescriptions')->get();

        $employeesPerActiveStatus = ActiveStatus::select('name')->withCount('jobStatuses')->get();

        $employeesPerContractType = ContractType::select('name')->withCount('jobStatuses')->get();

        return response()->json([$employeesPerDepartment, $employeesPerActiveStatus, $employeesPerContractType]);
    }
}
