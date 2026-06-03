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
    max-width:900px;
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

.form-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
}

.form-group{
    margin-bottom:15px;
}

.form-label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
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

.button-group{
    margin-top:25px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn-update{
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

.btn-update:hover{
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

.info-badge{
    display:inline-block;
    background:#dbeafe;
    color:#1d4ed8;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    margin-bottom:20px;
    font-weight:600;
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
        ✏️ Edit Data Kain
    </h2>

    <div class="page-subtitle">
        Perbarui informasi data kain pada sistem inventory.
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

    <div class="info-badge">
        ID Kain : {{ $kain->id }}
    </div>

    <form action="{{ route('gudang.kain.update',$kain->id) }}"
          method="POST">

        @csrf
        @method('PUT')

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
                    value="{{ old('nama_kain',$kain->nama_kain) }}">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Jenis Kain
                </label>

                <input
                    type="text"
                    name="jenis_kain"
                    class="form-control"
                    value="{{ old('jenis_kain',$kain->jenis_kain) }}">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Warna
                </label>

                <input
                    type="text"
                    name="warna"
                    class="form-control"
                    value="{{ old('warna',$kain->warna) }}">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    class="form-control"
                    value="{{ old('stok',$kain->stok) }}">
            </div>

            <div class="form-group">
                <label class="form-label">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="form-control"
                    value="{{ old('harga',$kain->harga) }}">
            </div>

        </div>

        <div class="button-group">

            <button type="submit" class="btn-update">
                💾 Update Data
            </button>

            <a href="{{ route('gudang.kain.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection