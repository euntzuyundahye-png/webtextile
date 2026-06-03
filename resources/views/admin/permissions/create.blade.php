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
    background:#ffffff;
    border-radius:20px;
    padding:30px;
    border:1px solid #dbeafe;
    box-shadow:0 10px 25px rgba(59,130,246,.08);
    max-width:750px;
}

.info-box{
    background:#eff6ff;
    border:1px solid #bfdbfe;
    color:#1d4ed8;
    padding:15px;
    border-radius:12px;
    margin-bottom:25px;
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
    padding:13px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    font-size:14px;
    outline:none;
    transition:.3s;
}

.form-control:focus{
    border-color:#60a5fa;
    box-shadow:0 0 0 4px rgba(96,165,250,.15);
}

.help-text{
    margin-top:8px;
    font-size:13px;
    color:#64748b;
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
    flex-wrap:wrap;
}

.btn-save{
    border:none;
    cursor:pointer;
    color:white;
    font-weight:600;
    padding:12px 25px;
    border-radius:10px;
    background:linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(59,130,246,.25);
}

.btn-back{
    text-decoration:none;
    background:#f1f5f9;
    color:#475569;
    padding:12px 25px;
    border-radius:10px;
    font-weight:600;
}

.btn-back:hover{
    background:#e2e8f0;
}

.permission-example{
    margin-top:15px;
    background:#f8fafc;
    border:1px dashed #cbd5e1;
    padding:12px;
    border-radius:10px;
    font-size:13px;
    color:#64748b;
}

@media(max-width:768px){

    .page-title{
        font-size:24px;
    }

    .form-card{
        padding:20px;
    }

    .button-group{
        flex-direction:column;
    }

}

</style>

<div class="page-header">

    <h2 class="page-title">
        🔑 Tambah Permission
    </h2>

    <div class="page-subtitle">
        Tambahkan hak akses baru untuk mengatur fitur yang dapat digunakan oleh setiap role.
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Permission digunakan untuk menentukan akses pengguna terhadap menu dan fitur dalam sistem Inventory Kain.
    </div>

    <form action="{{ route('permissions.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Nama Permission</label>

            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Contoh: user.view"
                value="{{ old('name') }}"
                required>

            <div class="help-text">
                Gunakan format yang konsisten agar mudah dikelola.
            </div>

            <div class="permission-example">
                Contoh Permission:
                <br>
                • user.view
                <br>
                • user.create
                <br>
                • user.edit
                <br>
                • user.delete
                <br>
                • kain.view
                <br>
                • stok_masuk.create
            </div>

        </div>

        <div class="button-group">

            <button
                type="submit"
                class="btn-save">

                💾 Simpan Permission

            </button>

            <a
                href="{{ route('permissions.index') }}"
                class="btn-back">

                ← Kembali

            </a>

        </div>

    </form>

</div>

@endsection