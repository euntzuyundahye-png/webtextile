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

.data-id{
    display:inline-block;
    margin-top:10px;
    padding:8px 15px;
    border-radius:20px;
    background:#dbeafe;
    color:#1d4ed8;
    font-size:13px;
    font-weight:600;
}

.form-card{
    background:white;
    border-radius:20px;
    padding:30px;
    border:1px solid #dbeafe;
    box-shadow:0 10px 25px rgba(59,130,246,.08);
    max-width:950px;
}

.info-box{
    background:#fee2e2;
    border:1px solid #fecaca;
    color:#b91c1c;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

.error-box{
    background:#fff1f2;
    border:1px solid #fecdd3;
    color:#be123c;
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

textarea.form-control{
    resize:none;
}

.full-width{
    grid-column:1 / -1;
}

.stock-info{
    font-size:13px;
    color:#64748b;
    margin-top:5px;
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
}

.btn-back:hover{
    background:#e2e8f0;
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
        ✏️ Edit Stok Keluar
    </h2>

    <div class="page-subtitle">
        Perbarui data transaksi pengeluaran stok kain
    </div>

    <div class="data-id">
        ID Transaksi : {{ $stokKeluar->id }}
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Ubah data yang diperlukan kemudian klik tombol <strong>Update Data</strong>.
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

    <form action="{{ route('stok-keluar.update', $stokKeluar->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">

                <label>Pilih Kain</label>

                <select name="kain_id" class="form-control">

                    @foreach($kains as $kain)

                        <option
                            value="{{ $kain->id }}"
                            @selected($stokKeluar->kain_id == $kain->id)>

                            {{ $kain->kode_kain }}
                            -
                            {{ $kain->nama_kain }}
                            (Stok : {{ $kain->stok }})

                        </option>

                    @endforeach

                </select>

                <small class="stock-info">
                    Pilih data kain yang akan diperbarui.
                </small>

            </div>

            <div class="form-group">

                <label>Tanggal Keluar</label>

                <input
                    type="date"
                    name="tanggal_keluar"
                    class="form-control"
                    value="{{ old('tanggal_keluar', $stokKeluar->tanggal_keluar) }}">

            </div>

            <div class="form-group">

                <label>Jumlah Keluar (Meter)</label>

                <input
                    type="number"
                    name="jumlah"
                    min="1"
                    class="form-control"
                    value="{{ old('jumlah', $stokKeluar->jumlah) }}">

            </div>

            <div class="form-group">

                <label>Tujuan Pengeluaran</label>

                <input
                    type="text"
                    name="tujuan"
                    class="form-control"
                    value="{{ old('tujuan', $stokKeluar->tujuan) }}">

            </div>

            <div class="form-group full-width">

                <label>Keterangan</label>

                <textarea
                    name="keterangan"
                    rows="5"
                    class="form-control">{{ old('keterangan', $stokKeluar->keterangan) }}</textarea>

            </div>

        </div>

        <div class="button-group">

            <button
                type="submit"
                class="btn-update">

                🔄 Update Data

            </button>

            <a
                href="{{ route('stok-keluar.index') }}"
                class="btn-back">

                ← Kembali

            </a>

        </div>

    </form>

</div>

@endsection