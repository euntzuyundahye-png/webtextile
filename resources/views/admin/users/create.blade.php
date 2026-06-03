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

.full-width{
    grid-column:1 / -1;
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
        #3b82f6,
        #2563eb
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
    box-shadow:0 8px 20px rgba(59,130,246,.25);
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
        👤 Tambah User
    </h2>

    <div class="page-subtitle">
        Tambahkan pengguna baru ke dalam sistem manajemen stok kain
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Lengkapi data pengguna dan tentukan role sesuai hak akses yang dibutuhkan.
    </div>

    <form action="{{ route('users.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Masukkan nama lengkap">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email">

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password">

            </div>

            <div class="form-group">

                <label>Role User</label>

                <select
                    name="role_id"
                    class="form-control">

                    @foreach($roles as $role)

                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="button-group">

            <button
                type="submit"
                class="btn-save">

                💾 Simpan User

            </button>

            <a
                href="{{ route('users.index') }}"
                class="btn-back">

                ← Kembali

            </a>

        </div>

    </form>

</div>

@endsection