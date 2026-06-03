@extends('layouts.admin')

@section('content')

<style>

.page-header{
    margin-bottom:25px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#dc2626;
}

.page-subtitle{
    color:#64748b;
    margin-top:5px;
}

.form-card{
    background:#fff;
    border-radius:20px;
    padding:30px;
    border:1px solid #dbeafe;
    box-shadow:0 10px 25px rgba(59,130,246,.08);
    max-width:950px;
}

.info-box{
    background:#fef2f2;
    border:1px solid #fecaca;
    color:#b91c1c;
    padding:15px;
    border-radius:12px;
    margin-bottom:25px;
}

.error-box{
    background:#fee2e2;
    color:#991b1b;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

.error-box ul{
    margin-left:20px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
}

.form-control{
    width:100%;
    padding:12px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    outline:none;
    transition:.3s;
    font-size:14px;
}

.form-control:focus{
    border-color:#f87171;
    box-shadow:0 0 0 4px rgba(248,113,113,.15);
}

textarea.form-control{
    resize:none;
}

.full-width{
    grid-column:1 / -1;
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
    flex-wrap:wrap;
}

.btn-save{
    background:linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(239,68,68,.25);
}

.btn-back{
    background:#f1f5f9;
    color:#475569;
    text-decoration:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
}

.btn-back:hover{
    background:#e2e8f0;
}

.stock-info{
    font-size:12px;
    color:#64748b;
    margin-top:5px;
}

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .page-title{
        font-size:24px;
    }

    .form-card{
        padding:20px;
    }

}

</style>

<div class="page-header">

    <h2 class="page-title">
        📤 Tambah Stok Keluar
    </h2>

    <div class="page-subtitle">
        Tambahkan transaksi pengeluaran stok kain dari gudang
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Pastikan jumlah stok keluar tidak melebihi stok kain yang tersedia di gudang.
    </div>

    @if(session('error'))

        <div class="error-box">
            {{ session('error') }}
        </div>

    @endif

    @if ($errors->any())

        <div class="error-box">

            <strong>Terdapat Kesalahan:</strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('stok-keluar.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Pilih Kain</label>

                <select name="kain_id" class="form-control">

                    <option value="">
                        -- Pilih Kain --
                    </option>

                    @foreach($kains as $kain)

                        <option value="{{ $kain->id }}">

                            {{ $kain->kode_kain }}
                            -
                            {{ $kain->nama_kain }}
                            (Stok: {{ $kain->stok }})

                        </option>

                    @endforeach

                </select>

                <small class="stock-info">
                    Pilih kain yang akan dikeluarkan dari stok.
                </small>

            </div>

            <div class="form-group">

                <label>Tanggal Keluar</label>

                <input
                    type="date"
                    name="tanggal_keluar"
                    value="{{ old('tanggal_keluar') }}"
                    class="form-control">

            </div>

            <div class="form-group">

                <label>Jumlah Keluar (Meter)</label>

                <input
                    type="number"
                    name="jumlah"
                    min="1"
                    value="{{ old('jumlah') }}"
                    class="form-control"
                    placeholder="Masukkan jumlah">

            </div>

            <div class="form-group">

                <label>Tujuan Pengiriman</label>

                <input
                    type="text"
                    name="tujuan"
                    value="{{ old('tujuan') }}"
                    class="form-control"
                    placeholder="Masukkan tujuan">

            </div>

            <div class="form-group full-width">

                <label>Keterangan</label>

                <textarea
                    name="keterangan"
                    rows="5"
                    class="form-control"
                    placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>

            </div>

        </div>

        <div class="button-group">

            <button type="submit" class="btn-save">
                📤 Simpan Stok Keluar
            </button>

            <a href="{{ route('stok-keluar.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection