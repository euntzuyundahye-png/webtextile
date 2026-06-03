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

.user-id{
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

.password-note{
    font-size:12px;
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
        ✏️ Edit User
    </h2>

    <div class="page-subtitle">
        Perbarui informasi pengguna dan hak akses sistem
    </div>

    <div class="user-id">
        ID User : {{ $user->id }}
    </div>

</div>

<div class="form-card">

    <div class="info-box">
        Ubah data pengguna sesuai kebutuhan. Kosongkan password jika tidak ingin menggantinya.
    </div>

    <form action="{{ route('users.update', $user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}">

            </div>

            <div class="form-group">

                <label>Password Baru (Opsional)</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Kosongkan jika tidak diubah">

                <small class="password-note">
                    Password hanya akan berubah jika diisi.
                </small>

            </div>

            <div class="form-group">

                <label>Role User</label>

                <select
                    name="role_id"
                    class="form-control">

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            @selected($user->role_id == $role->id)>

                            {{ $role->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="button-group">

            <button
                type="submit"
                class="btn-update">

                🔄 Update User

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