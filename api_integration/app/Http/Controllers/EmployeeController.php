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
            $employee->id = $employeeJson['id'];
            $employees[] = $employee;
        }
        $perPage = 12; // Change 10 to the number of items per page you want
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($employees, ($currentPage - 1) * $perPage, $perPage);
        $employeesPaginated = new LengthAwarePaginator($currentItems, count($employees), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('employee.index', ['employees' => $employeesPaginated]);
    }
    // Method to show the create employee form
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Display the specified resource.
     */
    public function show()


    {
        $employee_id = request()->employee;
        $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $employee_id);
        $employeeJson = $response->json();
        $employee = $this->toEmployee($employeeJson);

        return view('employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {



        $employee_id = request()->employee;
        $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $employee_id);
        $employeeJson = $response->json();
        $employee = $this->toEmployee($employeeJson);

        return view('employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Http::put('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id, [
            'name' => $request->name,
            'companyName' => $request->companyName,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'city' => $request->city,
        ]);
        if ($response->successful()) {
            $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id);
            $employeeJson = $response->json();
            $employee = $this->toEmployee($employeeJson);
            // Data updated successfully
            return redirect()->route('employee.show', ['employee' => $employee])->with('success', 'Employee updated successfully!');
        } else {
            // Handle the error if the request failed
            return redirect()->back()->with('error', 'Failed to update employee. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Send a DELETE request to the API endpoint to delete the employee
        $response = Http::delete('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id);
        // Check if the request was successful
        if ($response->successful()) {
            // Employee deleted successfully, redirect back to the index page
            return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
        } else {
            // Handle the error if the request failed
            return redirect()->back()->with('error', 'Failed to delete employee. Please try again.');
        }
    }
    public function toEmployee($employeeJson)
    {
        $employee = new Employee();

        $employee->name = $employeeJson['name'];
        $employee->companyName = $employeeJson['companyName'];
        $employee->gender = $employeeJson['gender'];
        $employee->salary = $employeeJson['salary'];
        $employee->city = $employeeJson['city'];
        $employee->id = $employeeJson['id'];
        return $employee;
    }
}
