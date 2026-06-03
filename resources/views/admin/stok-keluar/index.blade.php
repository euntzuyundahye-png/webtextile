@extends('layouts.admin')

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
    color:#2563eb;
}

.page-subtitle{
    color:#64748b;
    font-size:14px;
    margin-top:5px;
}

.btn-add{
    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );
    color:white;
    text-decoration:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-add:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(239,68,68,.25);
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:15px;
    border-radius:10px;
    margin-bottom:15px;
}

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    padding:15px;
    border-radius:10px;
    margin-bottom:15px;
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

.action-buttons{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.btn-edit{
    background:#f59e0b;
    color:white;
    text-decoration:none;
    padding:8px 14px;
    border-radius:8px;
    font-size:14px;
}

.btn-delete{
    background:#ef4444;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
    font-size:14px;
}

.btn-edit:hover{
    background:#d97706;
}

.btn-delete:hover{
    background:#dc2626;
}

.empty-data{
    text-align:center;
    padding:25px;
    color:#64748b;
}

@media(max-width:768px){

    .page-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .page-title{
        font-size:24px;
    }

    table{
        min-width:1200px;
    }
}

</style>

<div class="page-header">

    <div>

        <h2 class="page-title">
            📤 Data Stok Keluar
        </h2>

        <div class="page-subtitle">
            Kelola seluruh transaksi pengeluaran stok kain
        </div>

    </div>

    <a href="{{ route('stok-keluar.create') }}"
       class="btn-add">
        + Tambah Stok Keluar
    </a>

</div>


@if(session('error'))
<div class="alert-error">
    {{ session('error') }}
</div>
@endif

<div class="table-card">

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Kain</th>
                    <th>Nama Kain</th>
                    <th>Jumlah</th>
                    <th>Tujuan</th>
                    <th>Input Oleh</th>
                    <th>Aksi</th>
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
                        <span class="kode-badge">
                            {{ $item->kain->kode_kain }}
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

                    <td>
                        {{ $item->user->name }}
                    </td>

                    <td>

                        <div class="action-buttons">

                            <a href="{{ route('stok-keluar.edit',$item->id) }}"
                               class="btn-edit">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('stok-keluar.destroy',$item->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin hapus data?')">
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="empty-data">

                        Data stok keluar kosong

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection