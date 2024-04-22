<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/',[EmployeeController::class, 'index'])->name('employee.index');
// Route::get('/employee/{employee}',[EmployeeController::class, 'show'])->name('employee.show');
Route::resource('employee',EmployeeController::class);