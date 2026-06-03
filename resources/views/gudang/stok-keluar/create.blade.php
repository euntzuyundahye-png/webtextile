@extends('layouts.gudang')

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
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    max-width:850px;
}

.alert-danger{
    background:#fee2e2;
    color:#991b1b;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

.alert-danger ul{
    margin:0;
    padding-left:20px;
}

.form-group{
    margin-bottom:20px;
}

.form-label{
    display:block;
    font-weight:600;
    margin-bottom:8px;
    color:#374151;
}

.form-control{
    width:100%;
    padding:12px 15px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:15px;
    transition:.3s;
    box-sizing:border-box;
}

.form-control:focus{
    border-color:#dc2626;
    outline:none;
    box-shadow:0 0 0 4px rgba(220,38,38,.10);
}

textarea.form-control{
    resize:vertical;
}

.button-group{
    display:flex;
    gap:10px;
    margin-top:25px;
    flex-wrap:wrap;
}

.btn-save{
    background:#dc2626;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-save:hover{
    background:#b91c1c;
}

.btn-back{
    background:#64748b;
    color:white;
    text-decoration:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#475569;
}

.stock-info{
    font-size:13px;
    color:#ef4444;
    margin-top:5px;
}

@media(max-width:768px){

    .form-card{
        padding:20px;
    }

    .button-group{
        flex-direction:column;
    }

    .btn-save,
    .btn-back{
        width:100%;
        text-align:center;
    }

}

</style>

<div class="page-header">

    <h2 class="page-title">
        📤 Tambah Stok Keluar
    </h2>

    <div class="page-subtitle">
        Tambahkan transaksi stok kain keluar dari gudang.
    </div>

</div>

@if(session('error'))
<div class="alert-danger">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())

<div class="alert-danger">

    <strong>Terjadi Kesalahan:</strong>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="form-card">

<form action="{{ route('gudang.stok-keluar.store') }}" method="POST">

    @csrf

    <div class="form-group">

        <label class="form-label">
            Kain
        </label>

        <select name="kain_id" class="form-control">

            <option value="">
                -- Pilih Kain --
            </option>

            @foreach($kains as $kain)

            <option value="{{ $kain->id }}">

                {{ $kain->kode_kain }}
                -
                {{ $kain->nama_kain }}
                (Stok : {{ $kain->stok }})

            </option>

            @endforeach

        </select>

    </div>

    <div class="form-group">

        <label class="form-label">
            Tanggal Keluar
        </label>

        <input type="date"
               name="tanggal_keluar"
               class="form-control">

    </div>

    <div class="form-group">

        <label class="form-label">
            Jumlah Keluar
        </label>

        <input type="number"
               name="jumlah"
               min="1"
               class="form-control"
               placeholder="Masukkan jumlah stok keluar">

    </div>

    <div class="form-group">

        <label class="form-label">
            Tujuan Pengiriman
        </label>

        <input type="text"
               name="tujuan"
               class="form-control"
               placeholder="Contoh: Cabang Makassar">

    </div>

    <div class="form-group">

        <label class="form-label">
            Keterangan
        </label>

        <textarea name="keterangan"
                  rows="4"
                  class="form-control"
                  placeholder="Tambahkan keterangan jika diperlukan"></textarea>

    </div>

    <div class="button-group">

        <button type="submit"
                class="btn-save">
            💾 Simpan Data
        </button>

        <a href="{{ route('gudang.stok-keluar.index') }}"
           class="btn-back">
            ← Kembali
        </a>

    </div>

</form>

</div>

@endsection