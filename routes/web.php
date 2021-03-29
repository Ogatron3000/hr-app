<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'delete'])->name('employees.delete');

    Route::get('/employees/{employee}/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/employees/{employee}/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::get('/employees/{employee}/documents/{document}', [DocumentController::class, 'download'])->name('documents.download');
    Route::post('/employees/{employee}/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/employees/{employee}/documents/{document}', [DocumentController::class, 'delete'])->name('documents.delete');

    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    // transfer to api
    Route::get('/api/statistics', [StatisticsController::class, 'api'])->name('statistics.api');

    Route::get('/employees/{employee}/history', [HistoryController::class, 'index'])->name('history.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
});
