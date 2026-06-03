@extends('layouts.admin')

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
    box-shadow:0 10px 25px rgba(59,130,246,.08);
    max-width:900px;
}

.info-box{
    background:#eff6ff;
    border:1px solid #bfdbfe;
    color:#1d4ed8;
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
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
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
    border-color:#60a5fa;
    box-shadow:0 0 0 4px rgba(96,165,250,.15);
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
    flex-wrap:wrap;
}

.btn-update{
    background:linear-gradient(
        135deg,
        #f59e0b,
        #d97706
    );
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn-update:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(245,158,11,.25);
}

.btn-back{
    background:#f1f5f9;
    color:#475569;
    text-decoration:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#e2e8f0;
}

.data-id{
    display:inline-block;
    background:#dbeafe;
    color:#1d4ed8;
    padding:8px 15px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
    margin-top:10px;
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
        ✏️ Edit Data Kain
    </h2>

    <div class="page-subtitle">
        Perbarui informasi data kain pada sistem inventory
    </div>

    <div class="data-id">
        ID Data : {{ $kain->id }}
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Silakan ubah data yang diperlukan lalu klik tombol <strong>Update Data</strong>.
    </div>

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

    <form action="{{ route('kain.update', $kain->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">

                <label>Kode Kain</label>

                <input
                    type="text"
                    name="kode_kain"
                    class="form-control"
                    value="{{ old('kode_kain', $kain->kode_kain) }}">

            </div>

            <div class="form-group">

                <label>Nama Kain</label>

                <input
                    type="text"
                    name="nama_kain"
                    class="form-control"
                    value="{{ old('nama_kain', $kain->nama_kain) }}">

            </div>

            <div class="form-group">

                <label>Jenis Kain</label>

                <input
                    type="text"
                    name="jenis_kain"
                    class="form-control"
                    value="{{ old('jenis_kain', $kain->jenis_kain) }}">

            </div>

            <div class="form-group">

                <label>Warna</label>

                <input
                    type="text"
                    name="warna"
                    class="form-control"
                    value="{{ old('warna', $kain->warna) }}">

            </div>

            <div class="form-group">

                <label>Stok (Meter)</label>

                <input
                    type="number"
                    name="stok"
                    min="0"
                    class="form-control"
                    value="{{ old('stok', $kain->stok) }}">

            </div>

            <div class="form-group">

                <label>Harga per Meter</label>

                <input
                    type="number"
                    name="harga"
                    min="0"
                    step="0.01"
                    class="form-control"
                    value="{{ old('harga', $kain->harga) }}">

            </div>

        </div>

        <div class="button-group">

            <button type="submit"
                    class="btn-update">
                🔄 Update Data
            </button>

            <a href="{{ route('kain.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection