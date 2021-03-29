<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArchiveController extends Controller
{
    public function index()
    {
        $documents = Document::with('employee.jobDescriptions')->paginate(10);
        $now = Carbon::now()->toDateString();
        $nowPlusTwo = Carbon::now()->addMonths(2)->toDateString();

        return view('archive', compact('documents', 'now', 'nowPlusTwo'));
    }
}
