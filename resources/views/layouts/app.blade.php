<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventory Kain</title>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- LOTTIE -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Segoe UI', sans-serif;
    }

    body{
        background:#f1f5f9;
        color:#0f172a;
    }

    /* ================= LOADING ================= */
    #skeleton-loader{
        position:fixed;
        inset:0;
        background:#f1f5f9;
        display:flex;
        align-items:center;
        justify-content:center;
        z-index:9999;
    }

    .loader-card{
        width:320px;
        height:120px;
        border-radius:16px;
        background:linear-gradient(90deg,#e2e8f0,#f8fafc,#e2e8f0);
        background-size:200% 100%;
        animation:loading 1.5s infinite;
    }

    @keyframes loading{
        0%{background-position:200% 0}
        100%{background-position:-200% 0}
    }

    /* ================= NAVBAR ================= */
    .navbar{
        position:sticky;
        top:0;
        z-index:999;
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:16px 8%;

        background:rgba(255,255,255,0.75);
        backdrop-filter:blur(12px);

        border-bottom:1px solid rgba(37,99,235,0.15);
    }

    .logo{
        font-size:22px;
        font-weight:800;
        color:#2563eb;
    }

    .nav-links a{
        margin-left:18px;
        text-decoration:none;
        color:#334155;
        font-weight:500;
        transition:.3s;
    }

    .nav-links a:hover{
        color:#2563eb;
    }

    .login-btn{
        background:linear-gradient(135deg,#3b82f6,#2563eb);
        color:white !important;
        padding:10px 18px;
        border-radius:12px;
        box-shadow:0 10px 20px rgba(37,99,235,0.25);
    }

    /* ================= HERO ================= */
    .hero{
        min-height:92vh;
        display:flex;
        align-items:center;
        justify-content:center;
        text-align:center;
        padding:60px 8%;

        background:linear-gradient(-45deg,#2563eb,#60a5fa,#1d4ed8,#38bdf8);
        background-size:400% 400%;
        animation:gradientMove 10s ease infinite;

        color:white;
    }

    @keyframes gradientMove{
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }

    .container{
        max-width:900px;
    }

    .hero h1{
        font-size:50px;
        font-weight:800;
        margin-bottom:20px;
        text-shadow:0 10px 30px rgba(0,0,0,0.2);
    }

    .hero p{
        font-size:18px;
        line-height:1.7;
        margin-bottom:30px;
        opacity:0.95;
    }

    /* BUTTON */
    .hero-btn a{
        display:inline-block;
        padding:14px 24px;
        margin:8px;
        border-radius:12px;
        text-decoration:none;
        font-weight:600;
        transition:.3s;
    }

    .btn-primary{
        background:white;
        color:#2563eb;
    }

    .btn-primary:hover{
        transform:translateY(-3px);
    }

    .btn-secondary{
        border:2px solid white;
        color:white;
    }

    .btn-secondary:hover{
        background:white;
        color:#2563eb;
    }

    /* ================= SECTION ================= */
    section{
        padding:80px 8%;
    }

    section h2{
        text-align:center;
        font-size:36px;
        color:#2563eb;
        margin-bottom:40px;
        font-weight:800;
    }

    /* GRID */
    .feature-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:25px;
    }

    /* 3D CARD */
    .feature-card{
        background:white;
        padding:30px;
        border-radius:18px;
        text-align:center;

        box-shadow:0 10px 25px rgba(0,0,0,0.06);
        border:1px solid rgba(37,99,235,0.1);

        transition:.4s;
        position:relative;
        overflow:hidden;
    }

    .feature-card:hover{
        transform:translateY(-10px) rotateX(5deg) rotateY(-5deg);
        box-shadow:0 20px 40px rgba(37,99,235,0.2);
    }

    .feature-card::before{
        content:"";
        position:absolute;
        inset:0;
        background:radial-gradient(circle at top left, rgba(59,130,246,0.2), transparent 60%);
        opacity:0;
        transition:.4s;
    }

    .feature-card:hover::before{
        opacity:1;
    }

    /* FOOTER */
    footer{
        background:#0f172a;
        color:white;
        text-align:center;
        padding:25px;
    }

    /* RESPONSIVE */
    @media(max-width:768px){
        .hero h1{
            font-size:34px;
        }

        .nav-links{
            display:none;
        }
    }

    
/* ================= GRID FIX (ANTI TURUN) ================= */
.feature-grid{
    display:grid;
    grid-template-columns:repeat(4, minmax(0, 1fr));
    gap:24px;
    align-items:stretch;
}

/* TABLET */
@media(max-width:1024px){
    .feature-grid{
        grid-template-columns:repeat(2, 1fr);
    }
}

/* MOBILE */
@media(max-width:640px){
    .feature-grid{
        grid-template-columns:1fr;
    }
}

/* ================= CARD ================= */
.feature-card{
    background:white;
    padding:30px;
    border-radius:18px;
    text-align:center;

    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    border:1px solid rgba(37,99,235,0.1);

    transition:.4s ease;
    position:relative;
    overflow:hidden;

    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

/* HOVER 3D */
.feature-card:hover{
    transform:translateY(-10px) rotateX(5deg) rotateY(-5deg);
    box-shadow:0 20px 40px rgba(37,99,235,0.25);
}

/* GLOW EFFECT */
.feature-card::before{
    content:"";
    position:absolute;
    inset:0;
    background:radial-gradient(circle at top left, rgba(59,130,246,0.2), transparent 60%);
    opacity:0;
    transition:.4s;
}

.feature-card:hover::before{
    opacity:1;
}

    </style>
</head>

<body>

<!-- SKELETON LOADER -->
<div id="skeleton-loader">
    <div class="loader-card"></div>
</div>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">🧵 Indah Textile</div>

    <div class="nav-links">
        <a href="#fitur">Fitur</a>
        <a href="{{ route('login') }}" class="login-btn">Login</a>
    </div>
</nav>

@yield('content')

<footer>
    © {{ date('Y') }} Sistem Pencatatan Stok Kain
</footer>

<!-- SCRIPT -->
<script>
window.addEventListener("load", function(){
    document.getElementById("skeleton-loader").style.display = "none";

    AOS.init({
        duration:1000,
        once:true
    });
});
</script>

</body>
</html>