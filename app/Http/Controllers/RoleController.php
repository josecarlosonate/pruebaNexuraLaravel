<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolePostRequest;
use App\Models\Role;


class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function show(Request $request, Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RolePostRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        return redirect()->route('roles.index')->with('status', 'Role created!');
    }

    public function edit(Request $request, Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(RolePostRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->fill($data);
        $role->save();
        return redirect()->route('roles.index')->with('status', 'Role updated!');
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role destroyed!');
    }
}
