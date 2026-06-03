<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Panel</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f4f9ff;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            width:280px;
            background:linear-gradient(
                180deg,
                #60a5fa,
                #3b82f6
            );
            color:white;
            padding:25px;
            box-shadow:5px 0 20px rgba(0,0,0,.08);
        }

        .logo{
            text-align:center;
            margin-bottom:30px;
        }

        .logo h2{
            font-size:24px;
            margin-bottom:5px;
        }

        .logo p{
            font-size:13px;
            opacity:.9;
        }

        .menu-title{
            margin-top:25px;
            margin-bottom:10px;
            font-size:12px;
            font-weight:700;
            letter-spacing:1px;
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
            background:rgba(255,255,255,.20);
            transform:translateX(5px);
        }

        /* CONTENT */

        .content{
            flex:1;
            display:flex;
            flex-direction:column;
        }

        .navbar{
            background:white;
            padding:20px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 3px 15px rgba(0,0,0,.05);
        }

        .navbar h3{
            color:#2563eb;
            margin-bottom:5px;
        }

        .navbar small{
            color:#64748b;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:10px 18px;
            border-radius:10px;
            cursor:pointer;
            font-weight:600;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

        .main-content{
            padding:30px;
        }

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

        /* MOBILE */

        @media(max-width:768px){

            .wrapper{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
            }

            .navbar{
                flex-direction:column;
                gap:10px;
                text-align:center;
            }

            .main-content{
                padding:20px;
            }
        }
    </style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">
            <h2>👔 OWNER PANEL</h2>
            <p>Sistem Inventory Kain</p>
        </div>

        <ul>

            <li>
                <a href="{{ route('owner.dashboard') }}">
                    📊 Dashboard
                </a>
            </li>

            <div class="menu-title">
               
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
                    ⚙ Permission
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
                <a href="{{ route('owner.laporan.stok') }}">
                    📊 Laporan Stok
                </a>
            </li>

            <li>
                <a href="{{ route('owner.laporan.stok-masuk') }}">
                    📑 Laporan Masuk
                </a>
            </li>

            <li>
                <a href="{{ route('owner.laporan.stok-keluar') }}">
                    📋 Laporan Keluar
                </a>
            </li>

            @endif

        </ul>

    </aside>

    <!-- CONTENT -->

    <main class="content">

        <div class="navbar">

            <div>
                <h3>Selamat Datang Owner 👋</h3>
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

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>