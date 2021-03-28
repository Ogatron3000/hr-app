<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function index(Employee $employee)
    {
        $now = Carbon::now()->toDateString();
        $nowPlusTwo = Carbon::now()->addMonths(2)->toDateString();

        return view('documents.index', compact('employee', 'now', 'nowPlusTwo'));
    }

    public function download(Employee $employee, Document $document)
    {
        return Storage::download($document->file);
    }

    public function create(Employee $employee)
    {
        return view('documents.create', compact('employee'));
    }

    public function store(Employee $employee)
    {
        $validated = request()->validate([
            'name' => 'required',
            'date' => 'required|date',
            'expiry' => 'required|date',
            'file' => 'required|file|mimes:pdf'
        ]);

        $employee->addDocument($validated);

        return redirect($employee->path() . '/documents');
    }

    public function delete(Employee $employee, Document $document)
    {
        Storage::delete($document->file);

        $document->delete();

        return redirect($employee->path() . '/documents');
    }
}
