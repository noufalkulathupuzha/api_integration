<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee');
        $employeesJsonList = $response->json();
        $employees = [];
        foreach ($employeesJsonList as $employeeJson) {
            $employee = new Employee();
            $employee->name = $employeeJson['name'];
            $employee->companyName = $employeeJson['companyName'];
            $employee->gender = $employeeJson['gender'];
            $employee->salary = $employeeJson['salary'];
            $employee->city = $employeeJson['city'];
            $employees[] = $employee;
        }
        $perPage = 12; // Change 10 to the number of items per page you want
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($employees, ($currentPage - 1) * $perPage, $perPage);
        $employeesPaginated = new LengthAwarePaginator($currentItems, count($employees), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('employee.index', ['employees' => $employeesPaginated]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

   
}
