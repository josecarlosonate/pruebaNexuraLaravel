<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_employee_and_redirects()
    {

        $employee = factory(Employee::class)->make();
        $data = $employee->attributesToArray();
        $response = $this->post(route('employees.store'), $data);
        $response->assertRedirect(route('employees.index'));
        $response->assertSessionHas('status', 'Employee created!');
    }

    /**
     * @test
     */
    public function it_updates_employee_and_redirects()
    {
        $employee = factory(Employee::class)->create();
        $data = factory(Employee::class)->make()->attributesToArray();
        $response = $this->put(route('employees.update', ['employee' => $employee]), $data);
        $response->assertRedirect(route('employees.index'));
        $response->assertSessionHas('status', 'Employee updated!');
    }

    /**
     * @test
     */
    public function it_destroys_employee_and_redirects()
    {
        $employee = factory(Employee::class)->create();
        $response = $this->delete(route('employees.destroy', ['employee' => $employee]));
        $response->assertRedirect(route('employees.index'));
        $response->assertSessionHas('status', 'Employee destroyed!');
    }
}
