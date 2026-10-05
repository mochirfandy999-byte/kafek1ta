<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - CafeKita</title>

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                linear-gradient(
                    135deg,
                    rgba(20, 30, 24, 0.96),
                    rgba(43, 61, 49, 0.90)
                ),
                radial-gradient(
                    circle at top right,
                    #78906f,
                    transparent 45%
                );
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* =========================
           CONTAINER
        ========================= */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: flex;
            overflow: hidden;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.97);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.30);
        }


        /* =========================
           LEFT SIDE
        ========================= */

        .login-left {
            width: 50%;
            position: relative;
            padding: 55px;
            color: white;

            background:
                linear-gradient(
                    rgba(24, 48, 35, 0.90),
                    rgba(38, 70, 49, 0.94)
                ),
                radial-gradient(
                    circle at 20% 20%,
                    #8fa889,
                    transparent 40%
                );

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .coffee-decoration {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.12);
            right: -70px;
            top: -70px;
        }

        .coffee-decoration::before {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.10);
            top: 35px;
            left: 35px;
        }

        .brand-icon {
            width: 78px;
            height: 78px;
            border-radius: 22px;
            background: rgba(255,255,255,0.13);
            border: 1px solid rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            margin-bottom: 25px;
            backdrop-filter: blur(8px);
        }

        .brand-title {
            font-size: 46px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .brand-title span {
            color: #d9b56d;
        }

        .brand-description {
            max-width: 420px;
            color: rgba(255,255,255,0.78);
            line-height: 1.7;
            font-size: 16px;
            margin-bottom: 35px;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.88);
            font-size: 14px;
        }

        .feature-item i {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(217,181,109,0.15);
            color: #d9b56d;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* =========================
           RIGHT SIDE
        ========================= */

        .login-right {
            width: 50%;
            padding: 55px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-size: 32px;
            font-weight: 750;
            color: #202923;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #7a817c;
            margin-bottom: 0;
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #37413a;
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            color: #78837b;
            z-index: 5;
        }

        .form-control-custom {
            height: 54px;
            border: 1px solid #dfe4df;
            border-radius: 13px;
            padding-left: 48px;
            padding-right: 48px;
            font-size: 15px;
            transition: all 0.2s ease;
            background: #fafbfa;
        }

        .form-control-custom:focus {
            border-color: #466b52;
            box-shadow: 0 0 0 4px rgba(70,107,82,0.10);
            background: white;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #7b847e;
            z-index: 5;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: #304e3a;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-login {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 13px;
            background: #304e3a;
            color: white;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.2px;
            transition: all 0.2s ease;
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #243e2e;
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(48,78,58,0.20);
        }

        .btn-login:active {
            transform: translateY(0);
        }


        /* =========================
           ERROR
        ========================= */

        .alert-custom {
            border: none;
            border-radius: 12px;
            font-size: 14px;
            padding: 13px 15px;
            background: #fff0f0;
            color: #a33a3a;
            margin-bottom: 22px;
        }


        /* =========================
           FOOTER
        ========================= */

        .login-footer {
            text-align: center;
            margin-top: 28px;
            color: #929993;
            font-size: 12px;
        }

        .login-footer strong {
            color: #526058;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .login-wrapper {
                max-width: 520px;
                min-height: auto;
            }

            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
                padding: 45px 35px;
            }

        }

        @media (max-width: 480px) {

            body {
                padding: 12px;
            }

            .login-wrapper {
                border-radius: 20px;
            }

            .login-right {
                padding: 35px 25px;
            }

            .login-header h2 {
                font-size: 27px;
            }

        }

    </style>
</head>


<body>

    <div class="login-wrapper">

        {{-- =========================
             BAGIAN KIRI
        ========================== --}}

        <div class="login-left">

            <div class="coffee-decoration"></div>

            <div class="brand-icon">
                🍵
            </div>

            <div class="brand-title">
                Cafe<span>Kita</span>
            </div>

            <p class="brand-description">
                Tempat di mana perut kenyang, hati senang, 
                dan dompet tetap tenang! 
            </p>

            <div class="feature-list">

                <div class="feature-item">
                    <i class="bi bi-check-lg"></i>
                    <span>Lapar? Sini!</span>
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-lg"></i>
                    <span>Kopi, Mood, Repeat</span>
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-lg"></i>
                    <span>Duduk Sebentar...</span>
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-lg"></i>
                    <span>Datang, Makan, Bahagia</span>
                </div>

            </div>

        </div>


        {{-- =========================
             BAGIAN KANAN
        ========================== --}}

        <div class="login-right">

            <div class="login-header">

                <h2>
                    Selamat Datang 👋
                </h2>

                <p>
                    Silakan masuk untuk mengakses sistem CafeKita.
                </p>

            </div>


            {{-- PESAN ERROR LOGIN --}}

            @if(session('error'))

                <div class="alert alert-custom">

                    <i class="bi bi-exclamation-circle me-2"></i>

                    {{ session('error') }}

                </div>

            @endif


            {{-- FORM LOGIN --}}

            <form
                action="{{ route('proses.login') }}"
                method="POST"
            >

                @csrf


                {{-- USERNAME --}}

                <div>

                    <label
                        for="username"
                        class="form-label"
                    >
                        Username
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control form-control-custom"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}

                <div>

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control form-control-custom"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Tampilkan password"
                        >
                            <i
                                id="passwordIcon"
                                class="bi bi-eye"
                            ></i>
                        </button>

                    </div>

                </div>


                {{-- BUTTON LOGIN --}}

                <button
                    type="submit"
                    class="btn-login"
                >
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Masuk ke Sistem
                </button>

            </form>


            {{-- FOOTER --}}

            <div class="login-footer">

                <div>
                    Sistem Informasi <strong>CafeKita</strong>
                </div>

                <div class="mt-1">
                    © {{ date('Y') }} CafeKita
                </div>

            </div>

        </div>

    </div>


    {{-- SCRIPT PASSWORD --}}

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('bi-eye');

                icon.classList.add('bi-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('bi-eye-slash');

                icon.classList.add('bi-eye');

            }

        }

    </script>

</body>

</html>