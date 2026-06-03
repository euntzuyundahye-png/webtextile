@extends('layouts.gudang')

@section('content')

<style>

.dashboard-header{
    margin-bottom:30px;
}

.dashboard-title{
    font-size:32px;
    font-weight:700;
    color:#2563eb;
}

.dashboard-subtitle{
    color:#64748b;
    margin-top:8px;
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.stat-card{
    background:#ffffff;
    border-radius:20px;
    padding:25px;
    border:1px solid #dbeafe;
    box-shadow:0 10px 25px rgba(59,130,246,.08);
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.stat-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(59,130,246,.15);
}

.stat-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:5px;
}

.card-kain::before{
    background:#3b82f6;
}

.card-masuk::before{
    background:#10b981;
}

.card-keluar::before{
    background:#f59e0b;
}

.card-warning::before{
    background:#ef4444;
}

.card-icon{
    font-size:45px;
    margin-bottom:15px;
}

.card-title{
    color:#64748b;
    font-size:15px;
    margin-bottom:10px;
}

.card-value{
    font-size:34px;
    font-weight:700;
    color:#1e293b;
}

.card-desc{
    margin-top:10px;
    font-size:13px;
    color:#94a3b8;
}

.welcome-card{
    background:linear-gradient(
        135deg,
        #60a5fa,
        #3b82f6
    );
    color:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:30px;
    box-shadow:0 15px 30px rgba(59,130,246,.20);
}

.welcome-card h3{
    margin-bottom:8px;
    font-size:26px;
}

.welcome-card p{
    opacity:.95;
}

@media(max-width:768px){

    .dashboard-title{
        font-size:24px;
    }

    .card-value{
        font-size:28px;
    }

}

</style>

<div class="dashboard-header">

    <h2 class="dashboard-title">
        📦 Dashboard Gudang
    </h2>

    <div class="dashboard-subtitle">
        Monitoring stok kain dan aktivitas gudang secara real-time.
    </div>

</div>

<div class="welcome-card">

    <h3>
        Selamat Datang 👋
    </h3>

    <p>
        <strong>{{ auth()->user()->name }}</strong>
        di Sistem Informasi Inventory Kain.
    </p>

</div>

<div class="stats-grid">

    <div class="stat-card card-kain">

        <div class="card-icon">
            🧵
        </div>

        <div class="card-title">
            Total Data Kain
        </div>

        <div class="card-value">
            {{ $totalKain }}
        </div>

        <div class="card-desc">
            Jumlah seluruh data kain yang tersedia.
        </div>

    </div>

    <div class="stat-card card-masuk">

        <div class="card-icon">
            📥
        </div>

        <div class="card-title">
            Stok Masuk
        </div>

        <div class="card-value">
            {{ $totalMasuk }}
        </div>

        <div class="card-desc">
            Total transaksi stok masuk.
        </div>

    </div>

    <div class="stat-card card-keluar">

        <div class="card-icon">
            📤
        </div>

        <div class="card-title">
            Stok Keluar
        </div>

        <div class="card-value">
            {{ $totalKeluar }}
        </div>

        <div class="card-desc">
            Total transaksi stok keluar.
        </div>

    </div>

    <div class="stat-card card-warning">

        <div class="card-icon">
            ⚠️
        </div>

        <div class="card-title">
            Stok Menipis
        </div>

        <div class="card-value">
            {{ $stokMenipis }}
        </div>

        <div class="card-desc">
            Kain dengan stok ≤ 10.
        </div>

    </div>

</div>

@endsection