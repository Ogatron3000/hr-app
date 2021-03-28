<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\Employee;
use App\Models\JobStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $departmentCount = Department::count();
        $documentCount = Document::count();
        $wageExpenses = JobStatus::sum('wage');

        $docsThatExpireSoon = Document::with('employee')
            ->where('expiry', '>', Carbon::now())
            ->where('expiry', '<', Carbon::now()->addMonths(2))
            ->get();

        return view('dashboard', compact('employeeCount', 'departmentCount', 'documentCount', 'wageExpenses', 'docsThatExpireSoon'));
    }
}
