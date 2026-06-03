@extends('layouts.gudang')

@section('content')

<style>

.page-header{
    margin-bottom:25px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#2563eb;
}

.page-subtitle{
    color:#64748b;
    margin-top:5px;
}

.form-card{
    background:white;
    border-radius:20px;
    padding:30px;
    border:1px solid #dbeafe;
    box-shadow:0 10px 30px rgba(59,130,246,.08);
    max-width:800px;
}

.alert-danger{
    background:#fee2e2;
    color:#991b1b;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
    border-left:5px solid #ef4444;
}

.alert-danger ul{
    margin-left:20px;
}

.form-group{
    margin-bottom:20px;
}

.form-label{
    display:block;
    margin-bottom:8px;
    color:#1e293b;
    font-weight:600;
}

.form-control{
    width:100%;
    padding:12px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    font-size:14px;
    transition:.3s;
}

.form-control:focus{
    outline:none;
    border-color:#3b82f6;
    box-shadow:0 0 0 4px rgba(59,130,246,.15);
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
}

.button-group{
    display:flex;
    gap:10px;
    margin-top:25px;
    flex-wrap:wrap;
}

.btn-save{
    background:linear-gradient(
        135deg,
        #60a5fa,
        #3b82f6
    );
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
}

.btn-back{
    background:#e2e8f0;
    color:#334155;
    text-decoration:none;
    padding:12px 22px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#cbd5e1;
}

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-card{
        padding:20px;
    }

    .page-title{
        font-size:24px;
    }

}

</style>

<div class="page-header">

    <h2 class="page-title">
        ➕ Tambah Data Kain
    </h2>

    <div class="page-subtitle">
        Tambahkan data kain baru ke dalam sistem inventory.
    </div>

</div>

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

    <form action="{{ route('gudang.kain.store') }}" method="POST">

        @csrf

        <div class="form-grid">
<div class="form-grid">

    <div class="form-group">
        <label class="form-label">
            Kode Kain
        </label>

        <input
            type="text"
            class="form-control"
            value="Otomatis dibuat sistem"
            readonly>
    </div>

    <div class="form-group">
        <label class="form-label">
            Nama Kain
        </label>

        <input
            type="text"
            name="nama_kain"
            class="form-control"
            value="{{ old('nama_kain') }}"
            placeholder="Masukkan nama kain">
    </div>

            <div class="form-group">
                <label class="form-label">
                    Jenis Kain
                </label>

                <input
                    type="text"
                    name="jenis_kain"
                    class="form-control"
                    value="{{ old('jenis_kain') }}"
                    placeholder="Contoh: Katun, Satin, Linen">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Warna
                </label>

                <input
                    type="text"
                    name="warna"
                    class="form-control"
                    value="{{ old('warna') }}"
                    placeholder="Masukkan warna kain">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    class="form-control"
                    value="{{ old('stok') }}"
                    placeholder="Jumlah stok">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="form-control"
                    value="{{ old('harga') }}"
                    placeholder="Masukkan harga kain">
            </div>

        </div>

        <div class="button-group">

            <button type="submit" class="btn-save">
                💾 Simpan Data
            </button>

            <a href="{{ route('gudang.kain.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection