<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CRUD ROLE
    |--------------------------------------------------------------------------
    */

  public function index()
{
    $roles = Role::orderBy('id', 'asc')->get();

    return view(
        'admin.roles.index',
        compact('roles')
    );
}

    public function create()
    {
        return view(
            'admin.roles.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web'
        ]);

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role berhasil dibuat'
            );
    }

    public function edit(Role $role)
    {
        return view(
            'admin.roles.edit',
            compact('role')
        );
    }

    public function update(
        Request $request,
        Role $role
    ) {

        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        $role->update([
            'name' => $validated['name']
        ]);

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role berhasil diupdate'
            );
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Role berhasil dihapus'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | ASSIGN PERMISSION TO ROLE
    |--------------------------------------------------------------------------
    */

    public function permissions(Role $role)
    {
        $permissions = Permission::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.roles.permissions',
            compact(
                'role',
                'permissions'
            )
        );
    }

    public function updatePermissions(
        Request $request,
        Role $role
    ) {

        $role->permissions()->sync(
            $request->permissions ?? []
        );

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Permission role berhasil diperbarui'
            );
    }
}