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
    margin:0;
    padding-left:20px;
}

.form-group{
    margin-bottom:20px;
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
    border-radius:12px;
    font-size:15px;
    transition:.3s;
}

.form-control:focus{
    outline:none;
    border-color:#3b82f6;
    box-shadow:0 0 0 4px rgba(59,130,246,.15);
}

textarea.form-control{
    resize:none;
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
}

.btn-update{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
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
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#cbd5e1;
}

.info-box{
    background:#eff6ff;
    border:1px solid #bfdbfe;
    color:#1d4ed8;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
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
    ✏️ Edit Stok Masuk
</h2>

<div class="page-subtitle">
    Perbarui data transaksi stok masuk kain.
</div>


</div>

<div class="form-card">

<div class="info-box">
    Anda sedang mengubah data stok masuk yang telah tersimpan.
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

<form action="{{ route('gudang.stok-masuk.update',$stokMasuk->id) }}"
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
                @selected($stokMasuk->kain_id == $kain->id)>

                {{ $kain->kode_kain }}
                -
                {{ $kain->nama_kain }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="form-group">

        <label class="form-label">
            Tanggal Masuk
        </label>

        <input type="date"
               name="tanggal_masuk"
               class="form-control"
               value="{{ $stokMasuk->tanggal_masuk }}">

    </div>

    <div class="form-group">

        <label class="form-label">
            Jumlah
        </label>

        <input type="number"
               name="jumlah"
               min="1"
               class="form-control"
               value="{{ $stokMasuk->jumlah }}">

    </div>

    <div class="form-group">

        <label class="form-label">
            Supplier
        </label>

        <input type="text"
               name="supplier"
               class="form-control"
               value="{{ $stokMasuk->supplier }}">

    </div>

    <div class="form-group">

        <label class="form-label">
            Keterangan
        </label>

        <textarea name="keterangan"
                  rows="4"
                  class="form-control">{{ $stokMasuk->keterangan }}</textarea>

    </div>

    <div class="button-group">

        <button type="submit"
                class="btn-update">
            💾 Update Data
        </button>

        <a href="{{ route('gudang.stok-masuk.index') }}"
           class="btn-back">
            ← Kembali
        </a>

    </div>

</form>


</div>

@endsection
