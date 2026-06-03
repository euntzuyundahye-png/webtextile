<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')
            ->latest()
            ->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        $roles = Role::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.users.create',
            compact('roles')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'role_id'   => 'required|exists:roles,id',
        ]);

        User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => Hash::make(
                $validated['password']
            ),
            'role_id'   => $validated['role_id'],
        ]);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy(
            'name',
            'asc'
        )->get();

        return view(
            'admin.users.edit',
            compact(
                'user',
                'roles'
            )
        );
    }

    public function update(
        Request $request,
        User $user
    ) {

        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role_id'   => 'required|exists:roles,id',
            'password'  => 'nullable|min:6',
        ]);

        $data = [
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'role_id'   => $validated['role_id'],
        ];

        if (!empty($validated['password'])) {

            $data['password'] = Hash::make(
                $validated['password']
            );

        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil diupdate'
            );
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {

            return back()->with(
                'error',
                'Tidak bisa menghapus akun sendiri'
            );

        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil dihapus'
            );
    }
}