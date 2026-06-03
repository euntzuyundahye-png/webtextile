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

.permission-id{
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
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
}

.form-control{
    width:100%;
    padding:13px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    outline:none;
    font-size:14px;
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

.permission-example{
    background:#f8fafc;
    border:1px dashed #cbd5e1;
    border-radius:10px;
    padding:12px;
    margin-top:15px;
    color:#64748b;
    font-size:13px;
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
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-update:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(245,158,11,.25);
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
        ✏️ Edit Permission
    </h2>

    <div class="page-subtitle">
        Perbarui hak akses yang digunakan dalam sistem Inventory Kain.
    </div>

    <div class="permission-id">
        ID Permission : {{ $permission->id }}
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Permission menentukan akses yang dapat dilakukan oleh setiap role dalam sistem.
    </div>

    <form action="{{ route('permissions.update', $permission->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Nama Permission</label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $permission->name) }}"
                placeholder="Contoh: user.edit"
                required>

            <div class="help-text">
                Gunakan format yang konsisten agar mudah dikelola.
            </div>

            <div class="permission-example">
                Contoh:
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
                class="btn-update">

                🔄 Update Permission

            </button>

            <a href="{{ route('permissions.index') }}"
               class="btn-back">

                ← Kembali

            </a>

        </div>

    </form>

</div>

@endsection