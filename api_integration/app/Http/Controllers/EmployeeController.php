<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return view('employee.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
