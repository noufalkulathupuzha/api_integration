<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::resource('employee',EmployeeController::class);