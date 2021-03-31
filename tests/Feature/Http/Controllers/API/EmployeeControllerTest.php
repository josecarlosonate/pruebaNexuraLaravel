<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\User;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_employee_api()
    {
        $employee = factory(Employee::class)->make();
        $data = $employee->attributesToArray();
        $response = $this->json('POST','api/employees',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_employee_api()
    {
        $employee = factory(Employee::class)->create();
        $data = factory(Employee::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/employees/'.$employee->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_employee_api()
    {
        $employee = factory(Employee::class)->create();
        $response = $this->json('DELETE','api/employees/'.$employee->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $employee->refresh();
        $this->assertDatabaseMissing('employees',['id' => $employee->id]);

    }
}
