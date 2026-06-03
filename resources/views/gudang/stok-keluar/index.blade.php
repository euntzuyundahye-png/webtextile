@extends('layouts.gudang')

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

    .btn-add{
        background:#ef4444;
        color:white;
        text-decoration:none;
        padding:12px 20px;
        border-radius:12px;
        font-weight:600;
        transition:.3s;
    }

    .btn-add:hover{
        background:#dc2626;
        transform:translateY(-2px);
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

    .table-card{
        background:white;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
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

    tbody tr:hover{
        background:#f8fafc;
    }

    .jumlah-badge{
        background:#fee2e2;
        color:#b91c1c;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .aksi-group{
        display:flex;
        gap:8px;
        align-items:center;
        flex-wrap:wrap;
    }

    .btn-edit{
        background:#f59e0b;
        color:white;
        text-decoration:none;
        padding:8px 14px;
        border-radius:8px;
        font-size:14px;
        font-weight:600;
    }

    .btn-edit:hover{
        background:#d97706;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        border:none;
        padding:8px 14px;
        border-radius:8px;
        cursor:pointer;
        font-size:14px;
        font-weight:600;
    }

    .btn-delete:hover{
        background:#dc2626;
    }

    .empty-data{
        text-align:center;
        padding:30px;
        color:#64748b;
        font-size:15px;
    }

    @media(max-width:768px){

        .table-card{
            overflow-x:auto;
        }

        table{
            min-width:900px;
        }

        .page-header{
            flex-direction:column;
            align-items:flex-start;
        }
    }
</style>

<div class="page-header">

    <h2 class="page-title">
        📤 Data Stok Keluar
    </h2>

    <a href="{{ route('gudang.stok-keluar.create') }}"
       class="btn-add">
        + Tambah Stok Keluar
    </a>

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
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($stokKeluar as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ date('d-m-Y', strtotime($item->tanggal_keluar)) }}
                </td>

                <td>
                    {{ $item->kain->nama_kain }}
                </td>

                <td>
                    <span class="jumlah-badge">
                        {{ $item->jumlah }} Roll
                    </span>
                </td>

                <td>
                    {{ $item->tujuan }}
                </td>

                <td>
                    {{ $item->user->name }}
                </td>

                <td>

                    <div class="aksi-group">

                        <a href="{{ route('gudang.stok-keluar.edit',$item->id) }}"
                           class="btn-edit">
                            ✏️
                        </a>

                        <form action="{{ route('gudang.stok-keluar.destroy',$item->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="empty-data">
                    📭 Data stok keluar belum tersedia
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection