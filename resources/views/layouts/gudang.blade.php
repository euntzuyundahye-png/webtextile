<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Gudang</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f8fbff;
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        /* ======================
           SIDEBAR
        ====================== */

        .sidebar{
            width:270px;
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
            opacity:.9;
            font-size:14px;
        }

        .menu-title{
            margin-top:20px;
            margin-bottom:10px;
            font-size:13px;
            font-weight:bold;
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
            border-radius:10px;
            transition:.3s;
        }

        .sidebar ul li a:hover{
            background:rgba(255,255,255,.2);
        }

        /* ======================
           CONTENT
        ====================== */

        .content{
            flex:1;
            display:flex;
            flex-direction:column;
        }

        .navbar{
            background:white;
            padding:18px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 2px 15px rgba(0,0,0,.05);
        }

        .navbar h3{
            color:#2563eb;
        }

        .navbar small{
            color:#64748b;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:10px 18px;
            border-radius:8px;
            cursor:pointer;
            font-weight:600;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

        .main-content{
            padding:25px;
        }

        .alert-success{
            background:#dcfce7;
            color:#166534;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
        }

        .alert-error{
            background:#fee2e2;
            color:#991b1b;
            padding:15px;
            border-radius:12px;
            margin-bottom:20px;
        }

        /* ======================
           MOBILE
        ====================== */

        @media(max-width:768px){

            .container{
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

        }

    </style>

</head>

<body>

<div class="container">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo">
            <h2>📦 Gudang Kain</h2>
            <p>Sistem Inventory</p>
        </div>

        <ul>

            <li>
                <a href="{{ route('gudang.dashboard') }}">
                    🏠 Dashboard
                </a>
            </li>

            <div class="menu-title">
                MASTER DATA
            </div>

            @if(auth()->user()->hasPermission('kain.view'))
            <li>
                <a href="{{ route('gudang.kain.index') }}">
                    🧵 Data Kain
                </a>
            </li>
            @endif

            <div class="menu-title">
                TRANSAKSI
            </div>

            @if(auth()->user()->hasPermission('stok_masuk.view'))
            <li>
                <a href="{{ route('gudang.stok-masuk.index') }}">
                    📥 Stok Masuk
                </a>
            </li>
            @endif

            @if(auth()->user()->hasPermission('stok_keluar.view'))
            <li>
                <a href="{{ route('gudang.stok-keluar.index') }}">
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
                    📑 Laporan Masuk
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.stok-keluar') }}">
                    📋 Laporan Keluar
                </a>
            </li>

            @endif

        </ul>

    </div>

    <!-- CONTENT -->

    <div class="content">

        <div class="navbar">

            <div>

                <h3>
                    Selamat Datang 👋
                </h3>

                <small>
                    {{ auth()->user()->name }}
                    ({{ auth()->user()->role->name }})
                </small>

            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit"
                        class="logout-btn">
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

    </div>

</div>

</body>
</html>