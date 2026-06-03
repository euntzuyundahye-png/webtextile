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
        #60a5fa,
        #3b82f6
    );
    color:white;
    padding:15px 25px;
    border-radius:15px;
    min-width:180px;
    text-align:center;
}

.info-card h3{
    font-size:28px;
    margin-bottom:5px;
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

.kode-badge{
    background:#dbeafe;
    color:#1d4ed8;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.stok-aman{
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:700;
}

.stok-rendah{
    background:#fee2e2;
    color:#991b1b;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:700;
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

    table{
        min-width:900px;
    }
}

</style>

<div class="report-header">

    <div>

        <h2 class="report-title">
            📊 Laporan Stok Kain
        </h2>

        <div class="report-subtitle">
            Ringkasan seluruh persediaan kain yang tersedia dalam sistem
        </div>

    </div>

    <div class="info-card">
        <h3>{{ count($kains) }}</h3>
        <small>Total Data Kain</small>
    </div>

</div>

<div class="table-card">

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>Kode Kain</th>
                    <th>Nama Kain</th>
                    <th>Jenis</th>
                    <th>Warna</th>
                    <th>Stok Tersedia</th>
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
                        {{ $kain->nama_kain }}
                    </td>

                    <td>
                        {{ $kain->jenis_kain }}
                    </td>

                    <td>
                        {{ $kain->warna }}
                    </td>

                    <td>

                        @if($kain->stok > 10)

                            <span class="stok-aman">
                                {{ $kain->stok }} Meter
                            </span>

                        @else

                            <span class="stok-rendah">
                                {{ $kain->stok }} Meter
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="empty-data">
                        Data stok kain tidak tersedia.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection