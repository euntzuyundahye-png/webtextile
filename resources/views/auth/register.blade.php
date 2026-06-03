@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="logo">


    <h1>
        📝 REGISTER
    </h1>

    <p>
        Pendaftaran Petugas Gudang
    </p>


</div>

@if(session('success'))


<div class="alert success">

    {{ session('success') }}

</div>


@endif

@if($errors->any())

<div class="alert">

    {{ $errors->first() }}

</div>


@endif

<form action="{{ route('register.process') }}" method="POST">


    @csrf

    <div class="form-group">

        <label>
            Nama Lengkap
        </label>

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>

    </div>

    <div class="form-group">

        <label>
            Email
        </label>

        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>

    </div>

    <div class="form-group">

        <label>
            Password
        </label>

        <input type="password" name="password" minlength="6" placeholder="Minimal 6 karakter" required>

    </div>

    <div class="form-group">

        <label>
            Konfirmasi Password
        </label>

        <input type="password" name="password_confirmation" minlength="6" placeholder="Ulangi password" required>

    </div>

    <button type="submit" class="btn">
        Register
    </button>


</form>

<div class="link">


    <a href="{{ route('login') }}">
        Sudah punya akun?
        Login
    </a>


</div>

<div style="
        text-align:center;
        margin-top:25px;
        color:#94a3b8;
        font-size:13px;
    ">


    Role yang akan didapat:
    <strong>Petugas Gudang</strong>


</div>

@endsection