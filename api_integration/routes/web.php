<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EmployeeController::class, 'index'])->name('employee.index');
