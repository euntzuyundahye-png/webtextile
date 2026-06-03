<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\KainController;
use App\Http\Controllers\Admin\StokMasukController;
use App\Http\Controllers\Admin\StokKeluarController;
use App\Http\Controllers\Admin\LaporanController;

use App\Http\Controllers\Gudang\DashboardController as GudangDashboardController;
use App\Http\Controllers\Gudang\KainController as GudangKainController;
use App\Http\Controllers\Gudang\StokMasukController as GudangStokMasukController;
use App\Http\Controllers\Gudang\StokKeluarController as GudangStokKeluarController;

use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\LaporanController as OwnerLaporanController;


Route::get('/', function () {
    return view ('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // LOGIN

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    // REGISTER PETUGAS GUDANG

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'storeRegister'])
        ->name('register.process');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', function () {

        $user = auth()->user();

        if (!$user->role) {
            abort(403);
        }

        return match ($user->role->name) {

            'Admin' => redirect()->route('admin.dashboard'),

            'Petugas Gudang' => redirect()->route('gudang.dashboard'),

            'Owner' => redirect()->route('owner.dashboard'),

            default => abort(403)

        };

    })->name('dashboard');

});

Route::middleware([
    'auth'
])->prefix('admin')->group(function () {

    Route::get(
        '/dashboard',
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::resource(
        'users',
        UserController::class
    );

    Route::resource(
        'roles',
        RoleController::class
    );

    Route::resource(
        'permissions',
        PermissionController::class
    );

    Route::resource(
        'kain',
        KainController::class
    );

    Route::resource(
        'stok-masuk',
        StokMasukController::class
    );

    Route::resource(
        'stok-keluar',
        StokKeluarController::class
    );

    Route::get(
        '/roles/{role}/permissions',
        [RoleController::class, 'permissions']
    )->name('roles.permissions');

    Route::put(
        '/roles/{role}/permissions',
        [RoleController::class, 'updatePermissions']
    )->name('roles.permissions.update');

    Route::prefix('laporan')->group(function () {

        Route::get(
            '/stok',
            [LaporanController::class, 'stok']
        )->name('laporan.stok');

        Route::get(
            '/stok-masuk',
            [LaporanController::class, 'stokMasuk']
        )->name('laporan.stok-masuk');

        Route::get(
            '/stok-keluar',
            [LaporanController::class, 'stokKeluar']
        )->name('laporan.stok-keluar');

    });

});

Route::middleware([
    'auth'
])->prefix('gudang')->group(function () {

    Route::get(
        '/dashboard',
        [GudangDashboardController::class, 'index']
    )->name('gudang.dashboard');

    Route::resource(
        'kain',
        GudangKainController::class
    )->names('gudang.kain');

    Route::resource(
        'stok-masuk',
        GudangStokMasukController::class
    )->names('gudang.stok-masuk');

    Route::resource(
        'stok-keluar',
        GudangStokKeluarController::class
    )->names('gudang.stok-keluar');

});

Route::middleware([
    'auth'
])->prefix('owner')->group(function () {

    Route::get(
        '/dashboard',
        [OwnerDashboardController::class, 'index']
    )->name('owner.dashboard');

    Route::prefix('laporan')->group(function () {

        Route::get(
            '/stok',
            [OwnerLaporanController::class, 'stok']
        )->name('owner.laporan.stok');

        Route::get(
            '/stok-masuk',
            [OwnerLaporanController::class, 'stokMasuk']
        )->name('owner.laporan.stok-masuk');

        Route::get(
            '/stok-keluar',
            [OwnerLaporanController::class, 'stokKeluar']
        )->name('owner.laporan.stok-keluar');

    });

});