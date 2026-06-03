<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Inventory Kain</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#eef6ff;
            overflow-x:hidden;
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar{
            width:280px;
            position:fixed;
            top:0;
            left:0;
            bottom:0;
            overflow-y:auto;

            background:linear-gradient(
                180deg,
                #60a5fa,
                #93c5fd
            );

            padding:25px;

            box-shadow:
                0 0 25px rgba(96,165,250,.35);

            border-right:2px solid rgba(255,255,255,.3);
        }

        .logo{
            text-align:center;
            margin-bottom:25px;
            padding-bottom:20px;
            border-bottom:1px solid rgba(255,255,255,.3);
        }

        .logo h2{
            color:white;
            margin-bottom:5px;
        }

        .logo small{
            color:white;
            opacity:.9;
        }

        .menu-title{
            color:white;
            font-size:12px;
            font-weight:bold;
            letter-spacing:2px;
            margin-top:20px;
            margin-bottom:10px;
            opacity:.8;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar ul li{
            margin-bottom:8px;
        }

        .sidebar ul li a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px 15px;
            border-radius:12px;
            transition:.3s;
        }

        .sidebar ul li a:hover{
            background:rgba(255,255,255,.25);
            backdrop-filter:blur(10px);
            transform:translateX(5px);
        }

        /* ================= CONTENT ================= */

        .content{
            flex:1;
            margin-left:280px;
            min-height:100vh;
        }

        /* ================= NAVBAR ================= */

        .navbar{
            background:white;
            padding:20px 30px;

            display:flex;
            justify-content:space-between;
            align-items:center;

            box-shadow:
                0 4px 15px rgba(0,0,0,.05);

            position:sticky;
            top:0;
            z-index:100;
        }

        .welcome h3{
            color:#2563eb;
            margin-bottom:5px;
        }

        .welcome small{
            color:#64748b;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:10px 20px;
            border-radius:10px;
            cursor:pointer;
            transition:.3s;
        }

        .logout-btn:hover{
            background:#dc2626;
            transform:translateY(-2px);
        }

        /* ================= MAIN CONTENT ================= */

        .main-content{
            padding:30px;
        }

        .page-card{
            background:white;
            border-radius:20px;
            padding:25px;

            border:1px solid #dbeafe;

            box-shadow:
                0 0 20px rgba(96,165,250,.15);
        }

        /* ================= ALERT ================= */

        .alert-success{
            background:#dcfce7;
            color:#166534;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        }

        .alert-error{
            background:#fee2e2;
            color:#991b1b;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        }

        /* ================= SCROLLBAR ================= */

        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-thumb{
            background:#93c5fd;
            border-radius:10px;
        }

        /* ================= MOBILE ================= */

        @media(max-width:768px){

            .container{
                flex-direction:column;
            }

            .sidebar{
                position:relative;
                width:100%;
                height:auto;
            }

            .content{
                margin-left:0;
            }

            .navbar{
                flex-direction:column;
                gap:15px;
                text-align:center;
            }

            .main-content{
                padding:15px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            <h2>🧵 Inventory Kain</h2>
            <small>Sistem Manajemen Stok Kain</small>
        </div>

        <ul>

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    🏠 Dashboard
                </a>
            </li>

            <div class="menu-title">
                MASTER DATA
            </div>

            @if(auth()->user()->hasPermission('user.view'))
            <li>
                <a href="{{ route('users.index') }}">
                    👤 User
                </a>
            </li>
            @endif

            @if(auth()->user()->hasPermission('role.view'))
            <li>
                <a href="{{ route('roles.index') }}">
                    🔐 Role
                </a>
            </li>
            @endif

            @if(auth()->user()->hasPermission('permission.view'))
            <li>
                <a href="{{ route('permissions.index') }}">
                    ⚙️ Permission
                </a>
            </li>
            @endif

            @if(auth()->user()->hasPermission('kain.view'))
            <li>
                <a href="{{ route('kain.index') }}">
                    🧵 Data Kain
                </a>
            </li>
            @endif

            <div class="menu-title">
                TRANSAKSI
            </div>

            @if(auth()->user()->hasPermission('stok_masuk.view'))
            <li>
                <a href="{{ route('stok-masuk.index') }}">
                    📥 Stok Masuk
                </a>
            </li>
            @endif

            @if(auth()->user()->hasPermission('stok_keluar.view'))
            <li>
                <a href="{{ route('stok-keluar.index') }}">
                    📤 Stok Keluar
                </a>
            </li>
            @endif

            <div class="menu-title">
                LAPORAN
            </div>

            @if(auth()->user()->hasPermission('laporan.view'))

            <li>
                <a href="{{ route('laporan.stok') }}">
                    📊 Laporan Stok
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.stok-masuk') }}">
                    📑 Laporan Stok Masuk
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.stok-keluar') }}">
                    📋 Laporan Stok Keluar
                </a>
            </li>

            @endif

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- NAVBAR -->
        <div class="navbar">

            <div class="welcome">
                <h3>Selamat Datang 👋</h3>
                <small>
                    {{ auth()->user()->name }}
                    ({{ auth()->user()->role->name }})
                </small>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

        <!-- MAIN -->
        <div class="main-content">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="page-card">
                @yield('content')
            </div>

        </div>

    </div>

</div>

</body>
</html>