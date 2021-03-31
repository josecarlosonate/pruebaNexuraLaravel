<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Role;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_role_and_redirects()
    {

        $role = factory(Role::class)->make();
        $data = $role->attributesToArray();
        $response = $this->post(route('roles.store'), $data);
        $response->assertRedirect(route('roles.index'));
        $response->assertSessionHas('status', 'Role created!');
    }

    /**
     * @test
     */
    public function it_updates_role_and_redirects()
    {
        $role = factory(Role::class)->create();
        $data = factory(Role::class)->make()->attributesToArray();
        $response = $this->put(route('roles.update', ['role' => $role]), $data);
        $response->assertRedirect(route('roles.index'));
        $response->assertSessionHas('status', 'Role updated!');
    }

    /**
     * @test
     */
    public function it_destroys_role_and_redirects()
    {
        $role = factory(Role::class)->create();
        $response = $this->delete(route('roles.destroy', ['role' => $role]));
        $response->assertRedirect(route('roles.index'));
        $response->assertSessionHas('status', 'Role destroyed!');
    }
}
