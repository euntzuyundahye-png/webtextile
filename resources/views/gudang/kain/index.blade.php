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
    font-size:32px;
    font-weight:700;
    color:#2563eb;
}

.page-subtitle{
    color:#64748b;
}

.btn-add{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:12px;
    font-weight:600;
    box-shadow:0 8px 20px rgba(37,99,235,.2);
    transition:.3s;
}

.btn-add:hover{
    transform:translateY(-3px);
}

.stats-card{
    background:white;
    padding:20px;
    border-radius:18px;
    margin-bottom:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.stats-title{
    color:#64748b;
    font-size:14px;
}

.stats-value{
    font-size:32px;
    font-weight:700;
    color:#2563eb;
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
    border-left:5px solid #22c55e;
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
    color:#1d4ed8;
    font-weight:700;
    text-align:left;
}

td{
    padding:16px;
    border-top:1px solid #e5e7eb;
}

tbody tr:hover{
    background:#f8fafc;
}

.kode-badge{
    background:#dbeafe;
    color:#1d4ed8;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.stok-hijau{
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:20px;
    font-weight:600;
}

.stok-kuning{
    background:#fef3c7;
    color:#92400e;
    padding:6px 12px;
    border-radius:20px;
    font-weight:600;
}

.stok-merah{
    background:#fee2e2;
    color:#b91c1c;
    padding:6px 12px;
    border-radius:20px;
    font-weight:600;
}

.action-group{
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
    font-size:13px;
    font-weight:600;
}

.btn-delete{
    background:#ef4444;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
    font-size:13px;
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

    .table-card{
        overflow-x:auto;
    }

    table{
        min-width:1000px;
    }

}

</style>

<div class="page-header">

    <div>
        <h2 class="page-title">
            🧵 Data Kain
        </h2>

        <div class="page-subtitle">
            Kelola seluruh data kain pada gudang.
        </div>
    </div>

    <a href="{{ route('gudang.kain.create') }}"
       class="btn-add">
        + Tambah Data Kain
    </a>

</div>

<div class="stats-card">

    <div>
        <div class="stats-title">
            Total Data Kain
        </div>

        <div class="stats-value">
            {{ $kains->count() }}
        </div>
    </div>

    <div style="font-size:50px;">
        
    </div>

</div>


<div class="table-card">

    <table>

        <thead>

            <tr>
                <th width="70">No</th>
                <th>Kode</th>
                <th>Nama Kain</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Stok</th>
                <th>Harga</th>
                <th width="180">Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($kains as $kain)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

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

                    @if($kain->stok > 20)

                        <span class="stok-hijau">
                            {{ $kain->stok }}
                        </span>

                    @elseif($kain->stok > 10)

                        <span class="stok-kuning">
                            {{ $kain->stok }}
                        </span>

                    @else

                        <span class="stok-merah">
                            {{ $kain->stok }}
                        </span>

                    @endif

                </td>

                <td>
                    Rp {{ number_format($kain->harga,0,',','.') }}
                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('gudang.kain.edit',$kain->id) }}"
                           class="btn-edit">
                            ✏️ 
                        </a>

                        <form action="{{ route('gudang.kain.destroy',$kain->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Hapus data kain ini?')">
                                🗑 
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="8" class="empty-data">
                    📦 Data kain belum tersedia
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection