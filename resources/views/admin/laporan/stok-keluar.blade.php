@extends('layouts.admin')

@section('content')

<style>

.report-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:15px;
}

.report-title{
    font-size:30px;
    font-weight:700;
    color:#2563eb;
}

.report-subtitle{
    color:#64748b;
    margin-top:5px;
    font-size:14px;
}

.info-card{
    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );
    color:white;
    padding:15px 25px;
    border-radius:15px;
    text-align:center;
    min-width:180px;
}

.info-card h3{
    font-size:28px;
    margin-bottom:5px;
}

.filter-card{
    background:white;
    border:1px solid #dbeafe;
    border-radius:20px;
    padding:20px;
    margin-bottom:25px;
    box-shadow:0 8px 20px rgba(59,130,246,.08);
}

.filter-form{
    display:flex;
    gap:15px;
    align-items:end;
    flex-wrap:wrap;
}

.form-group{
    display:flex;
    flex-direction:column;
    gap:5px;
}

.form-group label{
    font-size:13px;
    font-weight:600;
    color:#475569;
}

.form-control{
    padding:10px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    outline:none;
}

.form-control:focus{
    border-color:#60a5fa;
}

.btn-filter{
    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );
    color:white;
    border:none;
    padding:11px 20px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.btn-filter:hover{
    opacity:.9;
}

.table-card{
    background:white;
    border-radius:20px;
    overflow:hidden;
    border:1px solid #dbeafe;
    box-shadow:0 10px 25px rgba(59,130,246,.08);
}

.table-responsive{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#eff6ff;
}

th{
    padding:16px;
    text-align:left;
    color:#1e40af;
    font-weight:700;
    border-bottom:2px solid #dbeafe;
}

td{
    padding:15px;
    border-bottom:1px solid #e5e7eb;
}

tbody tr{
    transition:.3s;
}

tbody tr:hover{
    background:#f8fbff;
}

.tanggal-badge{
    background:#e0f2fe;
    color:#0369a1;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.jumlah-badge{
    background:#fee2e2;
    color:#b91c1c;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:700;
}

.tujuan-badge{
    background:#f3f4f6;
    color:#374151;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.empty-data{
    text-align:center;
    padding:25px;
    color:#64748b;
}

@media(max-width:768px){

    .report-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .report-title{
        font-size:24px;
    }

    .filter-form{
        flex-direction:column;
        align-items:stretch;
    }

    table{
        min-width:800px;
    }
}

</style>

<div class="report-header">

    <div>

        <h2 class="report-title">
            📤 Laporan Stok Keluar
        </h2>

        <div class="report-subtitle">
            Laporan seluruh transaksi pengeluaran stok kain
        </div>

    </div>

    <div class="info-card">
        <h3>{{ count($stokKeluar) }}</h3>
        <small>Total Transaksi</small>
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

<div class="table-card">

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>Tanggal</th>
                    <th>Nama Kain</th>
                    <th>Jumlah Keluar</th>
                    <th>Tujuan</th>
                </tr>

            </thead>

            <tbody>

            @forelse($stokKeluar as $item)

                <tr>

                    <td>
                        <span class="tanggal-badge">
                            {{ $item->tanggal_keluar }}
                        </span>
                    </td>

                    <td>
                        {{ $item->kain->nama_kain }}
                    </td>

                    <td>
                        <span class="jumlah-badge">
                            - {{ $item->jumlah }} Meter
                        </span>
                    </td>

                    <td>
                        <span class="tujuan-badge">
                            {{ $item->tujuan }}
                        </span>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="empty-data">
                        Tidak ada data stok keluar.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection