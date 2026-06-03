@extends('layouts.owner')

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

.welcome-card{
    background:linear-gradient(
        135deg,
        #2563eb,
        #3b82f6
    );
    color:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:30px;
    box-shadow:0 15px 30px rgba(37,99,235,.20);
}

.welcome-card h3{
    margin:0 0 10px;
    font-size:26px;
}

.welcome-card p{
    margin:0;
    opacity:.95;
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.stat-card{
    background:white;
    border-radius:18px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.stat-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
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
    background:#2563eb;
}

.card-stok::before{
    background:#10b981;
}

.card-masuk::before{
    background:#f59e0b;
}

.card-keluar::before{
    background:#ef4444;
}

.card-icon{
    font-size:42px;
    margin-bottom:15px;
}

.card-title{
    color:#64748b;
    font-size:15px;
    margin-bottom:8px;
}

.card-value{
    font-size:34px;
    font-weight:700;
    color:#1e293b;
}

.card-desc{
    margin-top:10px;
    color:#94a3b8;
    font-size:13px;
}

.summary-card{
    margin-top:30px;
    background:white;
    border-radius:18px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.summary-title{
    font-size:20px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:15px;
}

.summary-text{
    color:#64748b;
    line-height:1.8;
}

@media(max-width:768px){

    .dashboard-title{
        font-size:26px;
    }

    .card-value{
        font-size:28px;
    }

}

</style>

<div class="dashboard-header">


<h2 class="dashboard-title">
    👑 Dashboard Owner
</h2>

<div class="dashboard-subtitle">
    Monitoring aktivitas dan persediaan kain secara keseluruhan.
</div>


</div>

<div class="welcome-card">


<h3>
    Selamat Datang, {{ auth()->user()->name }} 👋
</h3>

<p>
    Pantau seluruh data stok, transaksi masuk, dan transaksi keluar dari dashboard owner.
</p>


</div>

<div class="stats-grid">


<div class="stat-card card-kain">

    <div class="card-icon">🧵</div>

    <div class="card-title">
        Total Data Kain
    </div>

    <div class="card-value">
        {{ $totalKain }}
    </div>

    <div class="card-desc">
        Jumlah seluruh jenis kain yang terdaftar.
    </div>

</div>

<div class="stat-card card-stok">

    <div class="card-icon">📦</div>

    <div class="card-title">
        Total Stok Saat Ini
    </div>

    <div class="card-value">
        {{ $totalStok }}
    </div>

    <div class="card-desc">
        Total persediaan kain yang tersedia.
    </div>

</div>

<div class="stat-card card-masuk">

    <div class="card-icon">📥</div>

    <div class="card-title">
        Total Stok Masuk
    </div>

    <div class="card-value">
        {{ $totalMasuk }}
    </div>

    <div class="card-desc">
        Total transaksi stok masuk.
    </div>

</div>

<div class="stat-card card-keluar">

    <div class="card-icon">📤</div>

    <div class="card-title">
        Total Stok Keluar
    </div>

    <div class="card-value">
        {{ $totalKeluar }}
    </div>

    <div class="card-desc">
        Total transaksi stok keluar.
    </div>

</div>


</div>

<div class="summary-card">


<div class="summary-title">
    📊 Ringkasan Sistem
</div>

<div class="summary-text">
    Dashboard Owner digunakan untuk memantau seluruh aktivitas inventory kain,
    mulai dari jumlah data kain, stok yang tersedia, transaksi stok masuk,
    hingga transaksi stok keluar. Informasi ini membantu pemilik dalam
    mengambil keputusan terkait pengelolaan persediaan kain secara efektif.
</div>


</div>

@endsection
