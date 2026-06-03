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

.btn-update{
    background:#f59e0b;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-update:hover{
    background:#d97706;
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

.info-box{
    background:#f8fafc;
    border-left:4px solid #dc2626;
    padding:12px 15px;
    margin-bottom:20px;
    border-radius:10px;
    color:#475569;
}

@media(max-width:768px){

    .form-card{
        padding:20px;
    }

    .button-group{
        flex-direction:column;
    }

    .btn-update,
    .btn-back{
        width:100%;
        text-align:center;
    }

}

</style>

<div class="page-header">


<h2 class="page-title">
    ✏️ Edit Stok Keluar
</h2>

<div class="page-subtitle">
    Perbarui data transaksi stok kain keluar.
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


<div class="info-box">
    ID Transaksi :
    <strong>#{{ $stokKeluar->id }}</strong>
</div>

<form action="{{ route('gudang.stok-keluar.update',$stokKeluar->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">

        <label class="form-label">
            Kain
        </label>

        <select name="kain_id" class="form-control">

            @foreach($kains as $kain)

            <option value="{{ $kain->id }}"
                @selected($stokKeluar->kain_id == $kain->id)>

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
               value="{{ $stokKeluar->tanggal_keluar }}"
               class="form-control">

    </div>

    <div class="form-group">

        <label class="form-label">
            Jumlah Keluar
        </label>

        <input type="number"
               name="jumlah"
               min="1"
               value="{{ $stokKeluar->jumlah }}"
               class="form-control">

    </div>

    <div class="form-group">

        <label class="form-label">
            Tujuan Pengiriman
        </label>

        <input type="text"
               name="tujuan"
               value="{{ $stokKeluar->tujuan }}"
               class="form-control">

    </div>

    <div class="form-group">

        <label class="form-label">
            Keterangan
        </label>

        <textarea name="keterangan"
                  rows="4"
                  class="form-control">{{ $stokKeluar->keterangan }}</textarea>

    </div>

    <div class="button-group">

        <button type="submit"
                class="btn-update">
            🔄 Update Data
        </button>

        <a href="{{ route('gudang.stok-keluar.index') }}"
           class="btn-back">
            ← Kembali
        </a>

    </div>

</form>


</div>

@endsection
