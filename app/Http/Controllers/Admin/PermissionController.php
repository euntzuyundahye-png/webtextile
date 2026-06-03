<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view(
            'admin.permissions.index',
            compact('permissions')
        );
    }

    public function create()
    {
        return view(
            'admin.permissions.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create([
            'name' => $validated['name'],
            'guard_name' => 'web'
        ]);

        return redirect()
            ->route('permissions.index')
            ->with(
                'success',
                'Permission berhasil ditambahkan'
            );
    }

    public function edit(Permission $permission)
    {
        return view(
            'admin.permissions.edit',
            compact('permission')
        );
    }

    public function update(
        Request $request,
        Permission $permission
    ) {

        $validated = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update([
            'name' => $validated['name']
        ]);

        return redirect()
            ->route('permissions.index')
            ->with(
                'success',
                'Permission berhasil diupdate'
            );
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with(
                'success',
                'Permission berhasil dihapus'
            );
    }
}