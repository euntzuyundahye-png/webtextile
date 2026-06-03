<!DOCTYPE html>

<html lang="id">

<head>


    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {

        min-height: 100vh;

        display: flex;
        justify-content: center;
        align-items: center;

        overflow: hidden;

        background:
            linear-gradient(135deg,
                #f8fafc,
                #eef5ff,
                #ffffff);

        position: relative;
    }

    /*
    |--------------------------------------------------------------------------
    | Background Animation
    |--------------------------------------------------------------------------
    */

    .bg-circle {

        position: absolute;

        border-radius: 50%;

        filter: blur(80px);

        animation:
            float 12s ease-in-out infinite;
    }

    .circle-1 {

        width: 350px;
        height: 350px;

        background:
            rgba(59, 130, 246, .15);

        top: -120px;
        left: -120px;
    }

    .circle-2 {

        width: 300px;
        height: 300px;

        background:
            rgba(96, 165, 250, .12);

        bottom: -120px;
        right: -120px;

        animation-delay: 3s;
    }

    .circle-3 {

        width: 250px;
        height: 250px;

        background:
            rgba(191, 219, 254, .25);

        top: 45%;
        left: 65%;

        animation-delay: 6s;
    }

    @keyframes float {

        0% {

            transform:
                translateY(0) translateX(0);

        }

        50% {

            transform:
                translateY(-30px) translateX(20px);

        }

        100% {

            transform:
                translateY(0) translateX(0);

        }
    }

    /*
    |--------------------------------------------------------------------------
    | Card
    |--------------------------------------------------------------------------
    */

    .card {

        width: 450px;

        background:
            rgba(255, 255, 255, .75);

        backdrop-filter:
            blur(20px);

        border:
            1px solid rgba(255, 255, 255, .4);

        padding: 40px;

        border-radius: 30px;

        box-shadow:

            0 20px 60px rgba(15, 23, 42, .08),

            inset 0 1px 1px rgba(255, 255, 255, .7);

        z-index: 10;

        transition: .4s;
    }

    .card:hover {

        transform:
            translateY(-8px);

        box-shadow:
            0 35px 80px rgba(15, 23, 42, .12);

    }

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    */

    .logo {

        text-align: center;

        margin-bottom: 30px;
    }

    .logo h1 {

        color: #2563eb;

        font-size: 34px;

        font-weight: 700;

        letter-spacing: 1px;

        margin-bottom: 8px;
    }

    .logo p {

        color: #64748b;

        font-size: 14px;
    }

    /*
    |--------------------------------------------------------------------------
    | Form
    |--------------------------------------------------------------------------
    */

    .form-group {

        margin-bottom: 18px;
    }

    label {

        display: block;

        margin-bottom: 6px;

        color: #334155;

        font-weight: 600;
    }

    input {

        width: 100%;

        padding: 13px 15px;

        border: 1px solid #dbeafe;

        border-radius: 14px;

        background: white;

        outline: none;

        transition: .3s;
    }

    input:focus {

        border-color: #2563eb;

        box-shadow:
            0 0 15px rgba(37, 99, 235, .15);
    }

    /*
    |--------------------------------------------------------------------------
    | Button
    |--------------------------------------------------------------------------
    */

    .btn {

        width: 100%;

        padding: 14px;

        border: none;

        border-radius: 14px;

        background:
            linear-gradient(135deg,
                #2563eb,
                #3b82f6);

        color: white;

        font-size: 15px;

        font-weight: 600;

        cursor: pointer;

        transition: .3s;
    }

    .btn:hover {

        transform:
            translateY(-2px);

        box-shadow:
            0 15px 30px rgba(37, 99, 235, .25);

    }

    /*
    |--------------------------------------------------------------------------
    | Alert
    |--------------------------------------------------------------------------
    */

    .alert {

        background: #fee2e2;

        color: #dc2626;

        padding: 12px;

        border-radius: 12px;

        margin-bottom: 15px;

        font-size: 14px;
    }

    .success {

        background: #dcfce7;

        color: #15803d;
    }

    /*
    |--------------------------------------------------------------------------
    | Link
    |--------------------------------------------------------------------------
    */

    .link {

        text-align: center;

        margin-top: 20px;
    }

    .link a {

        color: #2563eb;

        text-decoration: none;

        font-weight: 600;
    }

    .link a:hover {

        text-decoration: underline;
    }

    /*
    |--------------------------------------------------------------------------
    | Responsive
    |--------------------------------------------------------------------------
    */

    @media(max-width:500px) {

        .card {

            width: 90%;
            padding: 30px;

        }

    }
    </style>


</head>

<body>


    <div class="bg-circle circle-1"></div>

    <div class="bg-circle circle-2"></div>

    <div class="bg-circle circle-3"></div>

    <div class="card">

        @yield('content')

    </div>


</body>

</html>