<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function create(Employee $employee)
    {
        return view('documents.create', compact('employee'));
    }

    public function store(Employee $employee)
    {
        $validated = request()->validate([
            'name' => 'required',
            'date' => 'required|date',
            'expire' => 'required|date',
            'file' => 'required|file|mimes:pdf'
        ]);

        $employee->addDocument($validated);
    }
}
