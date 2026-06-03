@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="logo">


    <h1>
        LOGIN
    </h1>

    <p>
        Sistem Manajemen Stok Kain
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

<form action="{{ route('login.process') }}" method="POST">


    @csrf

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

        <input type="password" name="password" placeholder="Masukkan password" required>

    </div>

    <button type="submit" class="btn">
        Login
    </button>


</form>

<div class="link">


    <a href="{{ route('register') }}">
        Belum punya akun?
        Register Petugas Gudang
    </a>


</div>

<div style="
        text-align:center;
        margin-top:25px;
        color:#94a3b8;
        font-size:13px;
    ">


    © {{ date('Y') }}
    Sistem Manajemen Stok Kain


</div>

@endsection