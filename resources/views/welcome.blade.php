<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top, #1a1b29, #0d0e14);
            color: #e6e6e6;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .hero {
            padding: 120px 20px;
            text-align: center;
            color: white;
            background: linear-gradient(135deg, rgba(79, 70, 229, .7), rgba(99, 102, 241, .7));
            backdrop-filter: blur(20px);
            animation: fadeDown 1s ease-out;
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            padding: 35px 20px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            transition: 0.35s ease;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeUp 1s forwards;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 0 35px rgba(93, 95, 239, 0.4);
        }

        .glass-icon {
            font-size: 45px;
            margin-bottom: 12px;
            color: #a3b3ff;
            text-shadow: 0 0 12px rgba(160, 167, 255, 0.6);
        }

        .hero-btn {
            padding: 12px 32px;
            font-size: 18px;
            border-radius: 50px;
            transition: 0.3s;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.25);
        }

        .role-section-title {
            animation: fadeDown 1s ease-out;
        }
    </style>
</head>

<body>

    <!-- HERO SECTION -->
    <div class="hero">
        <h1 class="display-3 fw-bold mb-3">Selamat Datang di Marketplace</h1>
        <p class="lead mb-4">Marketplace modern untuk Admin, Vendor, dan Customer.</p>

        <div>
            <a href="{{ route('login') }}" class="btn btn-light hero-btn me-2">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-outline-light hero-btn">
                <i class="bi bi-person-plus"></i> Register
            </a>
        </div>
    </div>

    <!-- ROLE SECTION -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold mb-5 role-section-title">Masuk sebagai</h2>

        <div class="row justify-content-center">

            <!-- ADMIN -->
            <div class="col-md-4 col-lg-3 mb-4">
                <a href="{{ route('login') }}" class="text-decoration-none text-light">
                    <div class="glass-card text-center">
                        <i class="bi bi-shield-lock glass-icon"></i>
                        <h3 class="fw-bold">Admin</h3>
                        <p class="text-muted mt-2">Mengelola user, kategori, dan produk.</p>
                    </div>
                </a>
            </div>

            <!-- VENDOR -->
            <div class="col-md-4 col-lg-3 mb-4">
                <a href="{{ route('login') }}" class="text-decoration-none text-light">
                    <div class="glass-card text-center">
                        <i class="bi bi-bag-check glass-icon"></i>
                        <h3 class="fw-bold">Vendor</h3>
                        <p class="text-muted mt-2">Mengelola produk serta pesanan pelanggan.</p>
                    </div>
                </a>
            </div>

            <!-- CUSTOMER -->
            <div class="col-md-4 col-lg-3 mb-4">
                <a href="{{ route('login') }}" class="text-decoration-none text-light">
                    <div class="glass-card text-center">
                        <i class="bi bi-people glass-icon"></i>
                        <h3 class="fw-bold">Customer</h3>
                        <p class="text-muted mt-2">Belanja produk dari berbagai vendor.</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
