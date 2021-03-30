<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Employee $employee)
    {
        $jobStatusHistory = $employee->jobStatusHistory()->with('contractType')->with('activeStatus')->with('bank')->latest()->get();

        $jobDescriptionHistory = $employee->jobDescriptionHistory()->with('department')->latest()->get();

        return view('history', compact('jobStatusHistory', 'jobDescriptionHistory'));
    }
}
