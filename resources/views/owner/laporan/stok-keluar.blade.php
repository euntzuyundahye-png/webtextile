@extends('layouts.owner')

@section('content')

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:15px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#dc2626;
}

.page-subtitle{
    color:#64748b;
    font-size:14px;
}

.filter-card{
    background:#ffffff;
    padding:20px;
    border-radius:18px;
    border:1px solid #fee2e2;
    box-shadow:0 10px 25px rgba(220,38,38,.08);
    margin-bottom:25px;
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
}

.form-group label{
    font-size:14px;
    font-weight:600;
    margin-bottom:6px;
    color:#374151;
}

.form-group input{
    padding:10px 14px;
    border:1px solid #d1d5db;
    border-radius:10px;
    min-width:180px;
}

.form-group input:focus{
    outline:none;
    border-color:#dc2626;
    box-shadow:0 0 0 3px rgba(220,38,38,.15);
}

.btn-filter{
    background:#dc2626;
    color:white;
    border:none;
    padding:11px 20px;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-filter:hover{
    background:#b91c1c;
}

.table-card{
    background:white;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #fee2e2;
    box-shadow:0 10px 25px rgba(220,38,38,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#fef2f2;
}

th{
    padding:15px;
    text-align:left;
    color:#991b1b;
    font-weight:700;
    border-bottom:2px solid #fecaca;
}

td{
    padding:14px 15px;
    border-bottom:1px solid #f3f4f6;
}

tbody tr:hover{
    background:#fff7f7;
}

.badge-keluar{
    background:#fee2e2;
    color:#b91c1c;
    padding:6px 12px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.badge-petugas{
    background:#e0f2fe;
    color:#0369a1;
    padding:6px 12px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.empty-data{
    text-align:center;
    padding:30px;
    color:#6b7280;
}

@media(max-width:768px){

    .table-card{
        overflow-x:auto;
    }

    table{
        min-width:850px;
    }

    .page-title{
        font-size:24px;
    }

}

</style>

<div class="page-header">

    <div>
        <h2 class="page-title">
            📤 Laporan Stok Keluar
        </h2>

        <div class="page-subtitle">
            Monitoring seluruh transaksi pengeluaran kain.
        </div>
    </div>

</div>

<div class="filter-card">

    <form method="GET" class="filter-form">

        <div class="form-group">
            <label>Tanggal Awal</label>
            <input
                type="date"
                name="tanggal_awal"
                value="{{ request('tanggal_awal') }}">
        </div>

        <div class="form-group">
            <label>Tanggal Akhir</label>
            <input
                type="date"
                name="tanggal_akhir"
                value="{{ request('tanggal_akhir') }}">
        </div>

        <button type="submit" class="btn-filter">
            🔍 Filter Data
        </button>

    </form>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th width="70">No</th>
                <th>Tanggal</th>
                <th>Nama Kain</th>
                <th>Jumlah</th>
                <th>Tujuan</th>
                <th>Petugas</th>
            </tr>
        </thead>

        <tbody>

            @forelse($stokKeluar as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->tanggal_keluar }}
                </td>

                <td>
                    {{ $item->kain->nama_kain }}
                </td>

                <td>
                    <span class="badge-keluar">
                        {{ $item->jumlah }} Meter
                    </span>
                </td>

                <td>
                    {{ $item->tujuan }}
                </td>

                <td>
                    <span class="badge-petugas">
                        {{ $item->user->name }}
                    </span>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="empty-data">
                    📭 Belum ada data stok keluar.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection