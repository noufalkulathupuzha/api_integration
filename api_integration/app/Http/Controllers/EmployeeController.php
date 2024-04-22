<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        try {
            $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee');

            if ($response->successful()) {
                $employeesJsonList = $response->json();
                $employees = [];
                foreach ($employeesJsonList as $employeeJson) {
                    $employee = $this->toEmployee($employeeJson);
                    $employees[] = $employee;
                }

                $perPage = 12;
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $currentItems = array_slice($employees, ($currentPage - 1) * $perPage, $perPage);
                $employeesPaginated = new LengthAwarePaginator($currentItems, count($employees), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

                return view('employee.index', ['employees' => $employeesPaginated]);
            } else {
                return redirect()->back()->with('error', 'Failed to fetch employees. Please try again later.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('employee.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        try {
            $response = Http::post('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/', $request->all());

            if ($response->successful()) {
                $employeeJson = $response->json();
                $employee = $this->toEmployee($employeeJson);

                return redirect()->route('employee.show', ['employee' => $employee])->with('success', 'Employee created successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to create employee. Please try again.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Display the specified resource.
    public function show($id)
    {
        try {
            $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id);

            if ($response->successful()) {
                $employeeJson = $response->json();
                $employee = $this->toEmployee($employeeJson);

                return view('employee.show', ['employee' => $employee]);
            } else {
                return redirect()->back()->with('error', 'Failed to fetch employee details. Please try again later.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        try {
            $response = Http::get('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id);

            if ($response->successful()) {
                $employeeJson = $response->json();
                $employee = $this->toEmployee($employeeJson);

                return view('employee.edit', ['employee' => $employee]);
            } else {
                return redirect()->back()->with('error', 'Failed to fetch employee details for editing. Please try again later.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        try {
            $response = Http::put('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id, $request->all());

            if ($response->successful()) {
                $employeeJson = $response->json();
                $employee = $this->toEmployee($employeeJson);

                return redirect()->route('employee.show', ['employee' => $employee])->with('success', 'Employee updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update employee. Please try again.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $response = Http::delete('https://61ee7a55d593d20017dbae9c.mockapi.io/api/employee/' . $id);

            if ($response->successful()) {
                return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to delete employee. Please try again.');
            }
        } catch (ConnectionException $e) {
            return redirect()->back()->with('error', 'Failed to connect to the server. Please check your internet connection and try again.');
        }
    }

    // Convert JSON data to Employee object
    private function toEmployee($employeeJson)
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
