@extends('layouts.admin')

@section('content')

<style>
    .dashboard-container{
        max-width:1200px;
        margin:auto;
        padding:20px;
    }

    .dashboard-title{
        font-size:32px;
        font-weight:700;
        color:#3b82f6;
        margin-bottom:25px;
    }

    .dashboard-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:20px;
    }

    .dashboard-card{
        background:#ffffff;
        border:2px solid #bfdbfe;
        border-radius:20px;
        padding:25px;
        box-shadow:
            0 0 15px rgba(191,219,254,0.5),
            0 0 30px rgba(219,234,254,0.3);
        transition:0.3s ease;
    }

    .dashboard-card:hover{
        transform:translateY(-5px);
        box-shadow:
            0 0 20px rgba(147,197,253,0.7),
            0 0 40px rgba(219,234,254,0.5);
    }

    .card-title{
        color:#64748b;
        font-size:16px;
        margin-bottom:10px;
        font-weight:600;
    }

    .card-value{
        font-size:40px;
        font-weight:bold;
        color:#2563eb;
    }

    @media(max-width:768px){

        .dashboard-title{
            font-size:24px;
            text-align:center;
        }

        .card-value{
            font-size:32px;
        }

        .dashboard-card{
            padding:20px;
        }
    }
</style>

<div class="dashboard-container">

    <h2 class="dashboard-title">
        Dashboard Admin
    </h2>

    <div class="dashboard-grid">

        <div class="dashboard-card">
            <div class="card-title">Total User</div>
            <div class="card-value">{{ $totalUser }}</div>
        </div>

        <div class="dashboard-card">
            <div class="card-title">Total Role</div>
            <div class="card-value">{{ $totalRole }}</div>
        </div>

        <div class="dashboard-card">
            <div class="card-title">Total Permission</div>
            <div class="card-value">{{ $totalPermission }}</div>
        </div>

        <div class="dashboard-card">
            <div class="card-title">Total Kain</div>
            <div class="card-value">{{ $totalKain }}</div>
        </div>

        <div class="dashboard-card">
            <div class="card-title">Total Stok Masuk</div>
            <div class="card-value">{{ $totalMasuk }}</div>
        </div>

        <div class="dashboard-card">
            <div class="card-title">Total Stok Keluar</div>
            <div class="card-value">{{ $totalKeluar }}</div>
        </div>

    </div>

</div>

@endsection