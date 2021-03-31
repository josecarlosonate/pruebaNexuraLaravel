<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeePostRequest;
use App\Models\Employee;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function show(Request $request, Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeePostRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);
        return redirect()->route('employees.index')->with('status', 'Employee created!');
    }

    public function edit(Request $request, Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(EmployeePostRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->fill($data);
        $employee->save();
        return redirect()->route('employees.index')->with('status', 'Employee updated!');
    }

    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('status', 'Employee destroyed!');
    }
}
