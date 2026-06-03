@extends('layouts.app')

@section('content')

<div class="hero">

    <div class="container" data-aos="fade-up">

        <!-- LOTTIE -->
        <lottie-player
            src="https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json"
            background="transparent"
            speed="1"
            style="width:280px;height:280px;margin:auto"
            loop
            autoplay>
        </lottie-player>

        <h1>🧵 Sistem Pencatatan Stok Kain</h1>

        <p>
            Sistem modern untuk mengelola stok kain secara real-time.
        </p>

        <div class="hero-btn">
            <a href="{{ route('login') }}" class="btn-primary">Login Sistem</a>
            <a href="#fitur" class="btn-secondary">Pelajari Lebih Lanjut</a>
        </div>

    </div>

</div>

<section id="fitur">

    <h2 data-aos="fade-up">Fitur Utama</h2>

    <div class="feature-grid">

        <div class="feature-card" data-aos="zoom-in">
            <h3>📦 Data Kain</h3>
            <p>Mengelola seluruh data kain secara terpusat.</p>
        </div>

        <div class="feature-card" data-aos="zoom-in" data-aos-delay="100">
            <h3>📥 Stok Masuk</h3>
            <p>Mencatat transaksi kain masuk secara real-time.</p>
        </div>

        <div class="feature-card" data-aos="zoom-in" data-aos-delay="200">
            <h3>📤 Stok Keluar</h3>
            <p>Mengelola distribusi kain keluar dengan mudah.</p>
        </div>

        <div class="feature-card" data-aos="zoom-in" data-aos-delay="300">
            <h3>📊 Laporan</h3>
            <p>Menampilkan laporan stok secara otomatis.</p>
        </div>

    </div>

</section>

@endsection