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
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:12px;
    font-weight:600;
    box-shadow:0 5px 15px rgba(59,130,246,.25);
    transition:.3s;
}

.btn-add:hover{
    transform:translateY(-2px);
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:14px 18px;
    border-radius:12px;
    margin-bottom:20px;
    border-left:5px solid #22c55e;
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
    background:#f8fbff;
}

.number-badge{
    background:#dbeafe;
    color:#1d4ed8;
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
    font-weight:600;
    display:inline-block;
}

.action-group{
    display:flex;
    gap:8px;
    align-items:center;
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

.btn-edit:hover{
    background:#d97706;
}

.btn-delete:hover{
    background:#dc2626;
}

.empty-data{
    text-align:center;
    padding:30px;
    color:#64748b;
}

@media(max-width:768px){

    .page-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .table-card{
        overflow-x:auto;
    }

    table{
        min-width:900px;
    }

}

</style>

<div class="page-header">

    <h2 class="page-title">
        📥 Data Stok Masuk
    </h2>

    <a href="{{ route('gudang.stok-masuk.create') }}"
       class="btn-add">
        + Tambah Stok Masuk
    </a>

</div>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th width="70">No</th>
                <th>Tanggal</th>
                <th>Nama Kain</th>
                <th>Jumlah</th>
                <th>Supplier</th>
                <th>Petugas</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($stokMasuk as $item)

            <tr>

                <td>
                    <span class="number-badge">
                        {{ $loop->iteration }}
                    </span>
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}
                </td>

                <td>
                    {{ $item->kain->nama_kain }}
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
                    {{ $item->user->name }}
                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('gudang.stok-masuk.edit',$item->id) }}"
                           class="btn-edit">
                            ✏️
                        </a>

                        <form action="{{ route('gudang.stok-masuk.destroy',$item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete">
                                🗑
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" class="empty-data">
                    📭 Data stok masuk belum tersedia
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection