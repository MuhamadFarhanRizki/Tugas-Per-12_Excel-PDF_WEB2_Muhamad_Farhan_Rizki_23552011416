<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #a8e063;
        }

        /* HEADER KE-2 (TEKS) */
        .header-dashboard {
            background: #95d35f;
            padding: 40px 0;
            text-align: center;
            border-bottom: 3px solid rgba(0,0,0,0.1);
        }

        .header-dashboard h2 {
            color: #1b4332;
            font-weight: bold;
        }

        .header-dashboard p {
            color: #2d6a4f;
        }

        /* CARD MENU */
        .card {
            border: 2px solid #2d6a4f;
            border-radius: 15px;
            background: #dff5c9;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* ICON */
        .menu-icon {
            width: 80px;
            margin-bottom: 10px;
            animation: float 2s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px);}
            50% { transform: translateY(-10px);}
            100% { transform: translateY(0px);}
        }

        .btn-success {
            background-color: #40916c;
            border: none;
        }

        .btn-success:hover {
            background-color: #2d6a4f;
        }

        /* SECTION MENU */
        .menu-section {
            padding: 50px 0;
        }
    </style>
</head>

<body>

<!-- NAVBAR (LAPIS 1) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand fw-bold">🌿 Sistem Akademik</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/mahasiswa">Mahasiswa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/jurusan">Jurusan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/matakuliah">Mata Kuliah</a>
                </li>

            </ul>

            <form action="/logout" method="POST" class="ms-3">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- HEADER (LAPIS 2) -->
<div class="header-dashboard">
    <h2>Selamat Datang di Dashboard 🌿</h2>
    <p>Pilih menu di bawah untuk mengelola data</p>
</div>

<!-- MENU (LAPIS 3) -->
<div class="container menu-section">

    <div class="row">

        <!-- MAHASISWA -->
        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <div class="card-body">
                    <!-- ICON BARU (beda dari login) -->
                    <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" class="menu-icon">
                    <h5>Mahasiswa</h5>
                    <a href="/mahasiswa" class="btn btn-success mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <!-- JURUSAN -->
        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <div class="card-body">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" class="menu-icon">
                    <h5>Jurusan</h5>
                    <a href="/jurusan" class="btn btn-success mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <!-- MATA KULIAH -->
        <div class="col-md-4">
            <div class="card shadow text-center p-3">
                <div class="card-body">
                    <img src="https://cdn-icons-png.flaticon.com/512/2995/2995620.png" class="menu-icon">
                    <h5>Mata Kuliah</h5>
                    <a href="/matakuliah" class="btn btn-success mt-2">Kelola</a>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>