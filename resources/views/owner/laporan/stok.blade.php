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
        color:#1e40af;
    }

    .page-subtitle{
        color:#64748b;
        margin-top:5px;
    }

    .summary-card{
        background:linear-gradient(
            135deg,
            #3b82f6,
            #1d4ed8
        );
        color:white;
        padding:25px;
        border-radius:20px;
        margin-bottom:25px;
        box-shadow:0 10px 30px rgba(59,130,246,.20);
    }

    .summary-title{
        font-size:15px;
        opacity:.9;
    }

    .summary-value{
        font-size:36px;
        font-weight:700;
        margin-top:10px;
    }

    .table-card{
        background:white;
        border-radius:20px;
        overflow:hidden;
        border:1px solid #dbeafe;
        box-shadow:0 10px 30px rgba(59,130,246,.08);
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

    .kode-badge{
        background:#dbeafe;
        color:#1d4ed8;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .stok-badge{
        padding:7px 14px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .stok-aman{
        background:#dcfce7;
        color:#166534;
    }

    .stok-menipis{
        background:#fee2e2;
        color:#b91c1c;
    }

    .harga{
        font-weight:700;
        color:#0f172a;
    }

    .empty-data{
        text-align:center;
        padding:30px;
        color:#64748b;
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
            📊 Laporan Stok Kain
        </h2>

        <div class="page-subtitle">
            Monitoring seluruh stok kain yang tersedia di gudang.
        </div>
    </div>

</div>

<div class="summary-card">

    <div class="summary-title">
        Total Jenis Kain
    </div>

    <div class="summary-value">
        {{ $kains->count() }}
    </div>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th>Kode Kain</th>
                <th>Nama Kain</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>

        <tbody>

        @forelse($kains as $kain)

            <tr>

                <td>
                    <span class="kode-badge">
                        {{ $kain->kode_kain }}
                    </span>
                </td>

                <td>
                    <strong>
                        {{ $kain->nama_kain }}
                    </strong>
                </td>

                <td>
                    {{ $kain->jenis_kain }}
                </td>

                <td>
                    {{ $kain->warna }}
                </td>

                <td>

                    <span class="stok-badge
                        {{ $kain->stok <= 10 ? 'stok-menipis' : 'stok-aman' }}">
                        
                        {{ $kain->stok }}

                    </span>

                </td>

                <td class="harga">
                    Rp {{ number_format($kain->harga,0,',','.') }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="empty-data">
                    📦 Belum ada data stok kain.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection