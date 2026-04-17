<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #a8e063, #56ab2f);
            overflow: hidden;
        }

        .wave {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 120px;
            transform: translateY(-50%);
            z-index: 0;
        }

        .center-box {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .login-card {
            width: 350px;
            border-radius: 15px;
        }

        .person {
            width: 90px;
            margin: 10px auto 0 auto;
            display: block;
            animation: breathe 3s infinite ease-in-out;
        }

        @keyframes breathe {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* ===== FIX PASSWORD ICON ===== */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 70%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #6c757d;
        }

        .toggle-password:hover {
            color: #000;
        }

    </style>

</head>

<body>

<!-- WAVE -->
<svg class="wave" viewBox="0 0 1440 320" preserveAspectRatio="none">
  <path fill="rgba(255,255,255,0.25)" d="M0,160 C360,80 1080,240 1440,160 L1440,320 L0,320 Z"></path>
</svg>

<div class="center-box">

    <div class="card p-4 shadow login-card">

        <h3 class="text-center text-success">Login 🌿</h3>

        <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" class="person">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <!-- PASSWORD + ICON -->
            <div class="mb-3 password-wrapper">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control pe-5">

                <i class="bi bi-eye toggle-password" onclick="togglePassword()"></i>
            </div>

            <button class="btn btn-success w-100">Login</button>
        </form>
    </div>

</div>

<!-- SCRIPT -->
<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.querySelector(".toggle-password");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>

</body>
</html>