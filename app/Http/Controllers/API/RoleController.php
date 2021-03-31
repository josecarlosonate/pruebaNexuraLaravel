<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\RolePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{


    public function index()
    {
        return Role::all();
    }

    public function show(Request $request, Role $role)
    {
        return $role;
    }

    public function store(RolePostRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        return $role;
    }

    public function update(RolePostRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->fill($data);
        $role->save();

        return $role;
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        return $role;
    }

}
