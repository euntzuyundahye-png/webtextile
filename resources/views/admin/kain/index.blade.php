@extends('layouts.admin')

@section('content')

<style>

.data-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:15px;
}

.page-title{
    color:#2563eb;
    font-size:30px;
    font-weight:700;
}

.page-subtitle{
    color:#64748b;
    font-size:14px;
    margin-top:5px;
}

.btn-add{
    background:linear-gradient(
        135deg,
        #60a5fa,
        #3b82f6
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
    box-shadow:0 8px 20px rgba(59,130,246,.3);
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
    font-size:14px;
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
    padding:7px 14px;
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
    font-weight:600;
}

.stok-rendah{
    background:#fee2e2;
    color:#991b1b;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.harga{
    color:#2563eb;
    font-weight:700;
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
    padding:30px;
    color:#64748b;
}

@media(max-width:768px){

    .data-header{
        flex-direction:column;
        align-items:flex-start;
    }

    table{
        min-width:1000px;
    }

    .page-title{
        font-size:24px;
    }
}

</style>

<div class="data-header">


<div>
    <h2 class="page-title">
        🧵 Data Kain
    </h2>

    <div class="page-subtitle">
        Kelola seluruh data persediaan kain pada sistem
    </div>
</div>

<a href="{{ route('kain.create') }}" class="btn-add">
    + Tambah Kain
</a>


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
                <th>Stok</th>
                <th>Harga</th>
                <th width="180">Aksi</th>
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

                <td class="harga">
                    Rp {{ number_format($kain->harga,0,',','.') }}
                </td>

                <td>

                    <div class="action-buttons">

                        <a href="{{ route('kain.edit', $kain->id) }}"
                           class="btn-edit">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('kain.destroy', $kain->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data kain ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete">
                                🗑 Hapus
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" class="empty-data">
                    Tidak ada data kain.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
