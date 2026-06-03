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
    max-width:950px;
}

.info-box{
    background:#dcfce7;
    border:1px solid #86efac;
    color:#166534;
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
    border-color:#60a5fa;
    box-shadow:0 0 0 4px rgba(96,165,250,.15);
}

.full-width{
    grid-column:1 / -1;
}

textarea.form-control{
    resize:none;
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
        #22c55e,
        #16a34a
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
    box-shadow:0 8px 20px rgba(34,197,94,.25);
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
        📥 Tambah Stok Masuk
    </h2>

    <div class="page-subtitle">
        Tambahkan transaksi stok kain yang masuk ke gudang
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Isi data stok masuk dengan lengkap untuk menambah persediaan kain pada sistem.
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

    <form action="{{ route('stok-masuk.store') }}"
          method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Kain</label>

                <select name="kain_id"
                        class="form-control">

                    <option value="">
                        -- Pilih Kain --
                    </option>

                    @foreach($kains as $kain)

                        <option value="{{ $kain->id }}">

                            {{ $kain->kode_kain }}
                            -
                            {{ $kain->nama_kain }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Tanggal Masuk</label>

                <input type="date"
                       name="tanggal_masuk"
                       class="form-control"
                       value="{{ old('tanggal_masuk') }}">

            </div>

            <div class="form-group">

                <label>Jumlah Masuk (Meter)</label>

                <input type="number"
                       name="jumlah"
                       min="1"
                       class="form-control"
                       value="{{ old('jumlah') }}"
                       placeholder="Masukkan jumlah">

            </div>

            <div class="form-group">

                <label>Supplier</label>

                <input type="text"
                       name="supplier"
                       class="form-control"
                       value="{{ old('supplier') }}"
                       placeholder="Masukkan nama supplier">

            </div>

            <div class="form-group full-width">

                <label>Keterangan</label>

                <textarea name="keterangan"
                          rows="5"
                          class="form-control"
                          placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>

            </div>

        </div>

        <div class="button-group">

            <button type="submit"
                    class="btn-save">
                💾 Simpan Data
            </button>

            <a href="{{ route('stok-masuk.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection