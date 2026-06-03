<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Kain;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'admin.dashboard',
            [
                'totalUser' => User::count(),
                'totalRole' => Role::count(),
                'totalPermission' => Permission::count(),
                'totalKain' => Kain::count(),
                'totalMasuk' => StokMasuk::count(),
                'totalKeluar' => StokKeluar::count(),
            ]
        );
    }
}