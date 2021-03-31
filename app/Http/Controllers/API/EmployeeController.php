<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{


    public function index()
    {
        return Employee::all();
    }

    public function show(Request $request, Employee $employee)
    {
        return $employee;
    }

    public function store(EmployeePostRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);
        return $employee;
    }

    public function update(EmployeePostRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->fill($data);
        $employee->save();

        return $employee;
    }

    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        return $employee;
    }

}
