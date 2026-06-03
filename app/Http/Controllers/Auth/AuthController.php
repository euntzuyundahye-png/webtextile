<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where(
            'email',
            $validated['email']
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Email tidak ditemukan
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Email tidak ditemukan.'
                ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Password salah
        |--------------------------------------------------------------------------
        */

        if (
            !Hash::check(
                $validated['password'],
                $user->password
            )
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'password' => 'Password salah.'
                ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Login berhasil
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS REGISTER
    |--------------------------------------------------------------------------
    */

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $roleGudang = Role::where(
            'name',
            'Petugas Gudang'
        )->first();

        if (!$roleGudang) {

            return back()->withErrors([
                'role' => 'Role Petugas Gudang tidak ditemukan.'
            ]);

        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(
                $validated['password']
            ),
            'role_id' => $roleGudang->id,
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registrasi berhasil. Silakan login.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}