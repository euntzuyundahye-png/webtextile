@extends('layouts.owner')

@section('content')

<style>
    .page-header{
        margin-bottom:25px;
    }

    .page-title{
        font-size:30px;
        font-weight:700;
        color:#1e40af;
    }

    .page-subtitle{
        color:#64748b;
        margin-top:5px;
    }

    .filter-card{
        background:#ffffff;
        border-radius:20px;
        padding:20px;
        margin-bottom:25px;
        border:1px solid #dbeafe;
        box-shadow:0 10px 25px rgba(59,130,246,.08);
    }

    .filter-form{
        display:flex;
        gap:15px;
        flex-wrap:wrap;
        align-items:end;
    }

    .form-group{
        display:flex;
        flex-direction:column;
        gap:8px;
    }

    .form-group label{
        font-size:14px;
        font-weight:600;
        color:#334155;
    }

    .form-control{
        padding:10px 15px;
        border:1px solid #cbd5e1;
        border-radius:10px;
        min-width:180px;
    }

    .btn-filter{
        background:#2563eb;
        color:white;
        border:none;
        padding:11px 20px;
        border-radius:10px;
        cursor:pointer;
        font-weight:600;
    }

    .btn-filter:hover{
        background:#1d4ed8;
    }

    .summary-card{
        background:linear-gradient(
            135deg,
            #10b981,
            #059669
        );
        color:white;
        padding:25px;
        border-radius:20px;
        margin-bottom:25px;
        box-shadow:0 10px 30px rgba(16,185,129,.20);
    }

    .summary-title{
        opacity:.9;
        font-size:15px;
    }

    .summary-value{
        font-size:35px;
        font-weight:700;
        margin-top:8px;
    }

    .table-card{
        background:white;
        border-radius:20px;
        overflow:hidden;
        border:1px solid #dbeafe;
        box-shadow:0 10px 25px rgba(59,130,246,.08);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#eff6ff;
    }

    th{
        padding:15px;
        text-align:left;
        color:#1e40af;
        font-weight:700;
        border-bottom:2px solid #dbeafe;
    }

    td{
        padding:15px;
        border-bottom:1px solid #e5e7eb;
        color:#334155;
    }

    tbody tr:hover{
        background:#f8fbff;
    }

    .date-badge{
        background:#e0f2fe;
        color:#0369a1;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .qty-badge{
        background:#dcfce7;
        color:#166534;
        padding:6px 12px;
        border-radius:20px;
        font-weight:700;
    }

    .user-badge{
        background:#ede9fe;
        color:#6d28d9;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .empty-data{
        text-align:center;
        padding:30px;
        color:#64748b;
    }

    @media(max-width:768px){

        .filter-form{
            flex-direction:column;
            align-items:stretch;
        }

        .table-card{
            overflow-x:auto;
        }

        table{
            min-width:900px;
        }

        .page-title{
            font-size:24px;
        }
    }
</style>

<div class="page-header">

    <h2 class="page-title">
        📥 Laporan Stok Masuk
    </h2>

    <div class="page-subtitle">
        Monitoring seluruh transaksi stok masuk kain.
    </div>

</div>

<div class="filter-card">

    <form method="GET" class="filter-form">

        <div class="form-group">
            <label>Tanggal Awal</label>
            <input
                type="date"
                name="tanggal_awal"
                value="{{ request('tanggal_awal') }}"
                class="form-control">
        </div>

        <div class="form-group">
            <label>Tanggal Akhir</label>
            <input
                type="date"
                name="tanggal_akhir"
                value="{{ request('tanggal_akhir') }}"
                class="form-control">
        </div>

        <button type="submit" class="btn-filter">
            🔍 Filter Data
        </button>

    </form>

</div>

<div class="summary-card">

    <div class="summary-title">
        Total Transaksi Stok Masuk
    </div>

    <div class="summary-value">
        {{ $stokMasuk->count() }}
    </div>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Kain</th>
                <th>Jumlah</th>
                <th>Supplier</th>
                <th>Petugas</th>
            </tr>
        </thead>

        <tbody>

        @forelse($stokMasuk as $item)

            <tr>

                <td>
                    <span class="date-badge">
                        {{ $item->tanggal_masuk }}
                    </span>
                </td>

                <td>
                    <strong>
                        {{ $item->kain->nama_kain }}
                    </strong>
                </td>

                <td>
                    <span class="qty-badge">
                        +{{ $item->jumlah }}
                    </span>
                </td>

                <td>
                    {{ $item->supplier }}
                </td>

                <td>
                    <span class="user-badge">
                        {{ $item->user->name }}
                    </span>
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" class="empty-data">
                    📦 Tidak ada data stok masuk.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection