<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register Admin - Birthday Reminder</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.35)
                ),
                url('/images/login-bg.jpeg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-wrapper {
            width: 100%;
            max-width: 430px;
            padding: 20px;
        }

        .register-card {
            background: white;
            border-radius: 20px;
            padding: 40px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, .08);
        }

        .register-title {
            text-align: center;
            color: #2F2F2F;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .register-subtitle {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: #475569;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2F2F2F;

            box-shadow:
                0 0 0 3px rgba(255, 170, 184, .15);
        }

        .btn-register {
            width: 100%;

            border: none;

            background: #2F2F2F;

            color: white;

            padding: 12px;

            border-radius: 10px;

            font-weight: 600;

            margin-top: 10px;

            transition: .2s;
        }

        .btn-register:hover {
            background: #494949;
            color: white;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;

            color: #64748b;

            font-size: 13px;
        }

        .login-link a {
            color: #2F2F2F;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;

            margin-top: 25px;

            color: #94a3b8;

            font-size: 12px;
        }

    </style>

</head>


<body>

    <div class="register-wrapper">

        <div class="register-card">

            <h2 class="register-title">
                Create Account
            </h2>

            <p class="register-subtitle">
                Daftarkan akun admin Birthday Reminder
            </p>


            @if ($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle me-2"></i>

                    <ul class="mb-0 ps-3">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('admin.register.submit') }}">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                        required
                        autofocus>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Minimal 6 karakter"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password"
                        required>

                </div>


                <button
                    type="submit"
                    class="btn-register">
                    Register

                </button>

            </form>


            <div class="login-link">

                Sudah punya akun?

                <a href="{{ route('admin.login') }}">
                    Login di sini
                </a>

            </div>


            <div class="footer-text">

                Birthday Reminder &copy; {{ date('Y') }}

            </div>

        </div>

    </div>

</body>

</html>