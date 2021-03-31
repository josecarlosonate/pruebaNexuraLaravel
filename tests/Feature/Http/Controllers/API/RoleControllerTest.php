<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_role_api()
    {
        $role = factory(Role::class)->make();
        $data = $role->attributesToArray();
        $response = $this->json('POST','api/roles',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_role_api()
    {
        $role = factory(Role::class)->create();
        $data = factory(Role::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/roles/'.$role->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_role_api()
    {
        $role = factory(Role::class)->create();
        $response = $this->json('DELETE','api/roles/'.$role->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $role->refresh();
        $this->assertDatabaseMissing('roles',['id' => $role->id]);

    }
}
