
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Reminder System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* GLOBAL */
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #000;
            overflow-x: hidden;
            background: #fff;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* LANDING PAGE + BACKGROUND FOTO */
        .landing-page {
            width: 100%;
            min-height: 780px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 35px;
            padding: 50px 30px 54px;
            position: relative;
            isolation: isolate;
            background-image: url('/images/welcome-bg.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .landing-page::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.12);
            z-index: -1;
            pointer-events: none;
        }

        
/* NAVBAR */
.frame {
    position: relative;
    width: 100%;
    max-width: 1100px;
    height: 64px;
    flex-shrink: 0;
    z-index: 30;
}

.navbar-custom {
    position: relative;
    width: 100%;
    min-height: 65px;
    background: rgba(255, 255, 255, 0.97);
    border: 1px solid #eeeeee;
    border-radius: 40px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 0 25px;
    box-sizing: border-box;
}

/* RESPONSIVE NAVBAR */
@media (max-width: 700px) {
    .frame {
        height: auto;
        min-height: 56px;
    }

    .navbar-custom {
        min-height: 56px;
        gap: 10px;
        padding: 10px 16px;
        border-radius: 16px;
        flex-wrap: wrap;
    }
}

        .bday-reminder {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            flex-shrink: 0;
            font-size: 22px;
            font-weight: 700;
            white-space: nowrap;
        }

        .brand-black {
            color: #000;
        }

        .brand-red {
            color: #000;
        }

        .brand-icon {
            color: #000;
            margin-right: 5px;
            font-size: 22px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-link-custom {
            font-size: 14px;
            font-weight: 600;
            color: #000;
            text-decoration: none;
            white-space: nowrap;
            transition: color 0.2s ease;
        }

        .nav-link-custom:hover {
            color: #b88746;
        }

        .login-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-width: 100px;
            padding: 12px 20px;
            border-radius: 40px;
            background: #d9d9d9;
            color: #000;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            transition: 0.25s ease;
        }

        .login-button:hover {
            background: #c7c7c7;
            color: #000;
            transform: translateY(-2px);
        }

        /* MAIN FRAME */
        .frame-2 {
            position: relative;
            width: 100%;
            max-width: 944px;
            min-height: 710px;
            margin-top: 10px;
            flex-shrink: 0;
        }

        .main-container {
            position: absolute;
            top: -5px;
            left: -15px;
            width: calc(100% + 30px);
            height: 500px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 25px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.08);
            z-index: 0;
        }

        .page-title {
            position: absolute;
            top: 15px;
            left: 0;
            font-size: 20px;
            font-weight: 600;
            color: #000;
            z-index: 2;
        }

        .dashboard-label {
            position: absolute;
            top: 17px;
            right: 0;
            font-size: 13px;
            color: #777;
            z-index: 2;
        }

        /* FIGMA DECORATIVE BLOCKS */
        .preview-main,
        .preview-small-left,
        .preview-small-right,
        .preview-side,

        .preview-main {
            top: 50px;
            left: 0;
            width: 73.4%;
            height: 180px;
        }

        .preview-small-left {
            top: 240px;
            left: 0;
            width: 36.9%;
            height: 120px;
        }

        .preview-small-right {
            top: 240px;
            left: 37.9%;
            width: 35.5%;
            height: 120px;
        }

        .preview-side {
            top: 50px;
            right: 0;
            width: 25.4%;
            height: 310px;
        }

        
        /* REAL DASHBOARD PREVIEW */
        .real-dashboard-preview {
            position: absolute;
            top: 50px;
            left: 0;
            width: 100%;
            min-height: 310px;
            padding: 15px;
            z-index: 10;
        }

        .real-preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .real-preview-title {
            font-size: 13px;
            font-weight: 700;
            color: #000;
        }

        .open-dashboard {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 7px 10px;
            background: #2f2f2f;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 9px;
            font-weight: 600;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .open-dashboard:hover {
            background: #494949;
            color: #fff;
            transform: translateY(-1px);
        }

        /* STATISTICS */
        
/* Susunan kotak seperti layout Figma */
.real-stat-grid {
    display: grid;
    grid-template-columns: 1.2fr 1.2fr 0.85fr;
    grid-template-rows: 105px 82px;
    gap: 8px;
    margin-bottom: 14px;
}

.real-stat-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #d9d9d9;
    border: none;
    border-radius: 15px;
    padding: 10px;

    color: #000;
    text-decoration: none;
    text-align: center;

    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.real-stat-card:hover {
    color: #000;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

/* Kotak besar di kiri atas */
.real-stat-card.total {
    grid-column: 1 / 3;
    grid-row: 1;
}

/* Kotak kanan yang tinggi */
.real-stat-card.birthday {
    grid-column: 3;
    grid-row: 1 / 3;
}

/* Dua kotak kecil di bawah */
.real-stat-card.today {
    grid-column: 1;
    grid-row: 2;
}

.real-stat-card.sent {
    grid-column: 2;
    grid-row: 2;
}


/* Perbaiki bentuk ikon agar tetap proporsional */
.stat-icon,
.birthday-icon {
    flex-shrink: 0;
    aspect-ratio: 1 / 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-icon i,
.birthday-icon i {
    display: inline-block;
    line-height: 1;
    flex-shrink: 0;
    transform: none;
}

.real-stat-number {
    font-size: 16px;
    font-weight: 700;
    color: #222;
}

.real-stat-label {
    font-size: 9px;
    color: #333;
    margin-top: 3px;
}

@media (max-width: 750px) {
    .real-stat-grid {
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 100px 100px 100px;
    }

    .real-stat-card.total {
        grid-column: 1 / 3;
        grid-row: 1;
    }

    .real-stat-card.today {
        grid-column: 1;
        grid-row: 3;
    }

    .real-stat-card.sent {
        grid-column: 2;
        grid-row: 3;
    }
}


        /* FEATURES */
        .features-section {
            width: 100%;
            max-width: 1280px;
            margin-top: -90px;
            padding: 50px 20px 80px;
            position: relative;
            z-index: 2;
        }

        .features-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .features-title h2 {
            font-size: 30px;
            font-weight: 700;
            margin: 0;
            color: #fff;
        }

        .features-title p {
            margin-top: 8px;
            font-size: 14px;
            color: #fff;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: auto;
        }

        .feature-card {
            padding: 30px;
            border-radius: 18px;
            background: #fff;
            border: 1px solid #eee;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.10);
        }

        .feature-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #2f2f2f;
            color: #fff;
            font-size: 23px;
        }

        .feature-card h4 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .feature-card p {
            font-size: 12px;
            color: #777;
            line-height: 1.7;
            margin: 0;
        }

        /* FOOTER */
        footer {
            width: 100%;
            padding: 25px;
            text-align: center;
            background: #2f2f2f;
            color: #fff;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .landing-page {
                padding: 30px 25px;
            }

            .navbar-custom {
                min-height: 75px;
                padding: 0 25px;
            }

            .bday-reminder {
                font-size: 19px;
            }

            .nav-menu {
                gap: 18px;
            }

            .frame-2 {
                transform: scale(0.85);
                transform-origin: top center;
                margin-bottom: -100px;
            }

            .features-section {
                margin-top: -100px;
            }
        }

        @media (max-width: 750px) {
            .landing-page {
                min-height: auto;
                padding: 20px 15px 30px;
                background-attachment: scroll;
            }

            .frame {
                height: 65px;
            }

            .navbar-custom {
                min-height: 65px;
                border-radius: 40px;
                padding: 0 18px;
                gap: 10px;
            }

            .bday-reminder {
                font-size: 15px;
            }

            .brand-icon {
                font-size: 16px;
            }

            .nav-menu {
                gap: 10px;
            }

            .nav-link-custom {
                display: none;
            }

            .login-button {
                min-width: auto;
                padding: 10px 13px;
                font-size: 11px;
            }

            .frame-2 {
                width: 944px;
                transform: scale(0.65);
                transform-origin: top center;
                margin-bottom: -240px;
            }

            .features-section {
                margin-top: 0;
                padding: 45px 15px 60px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
                max-width: 450px;
            }
        }

        @media (max-width: 480px) {
            .frame-2 {
                transform: scale(0.38);
                margin-bottom: -420px;
            }

            .features-title h2 {
                font-size: 25px;
            }

            .feature-card {
                padding: 25px 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

<div class="landing-page">

    <!-- NAVBAR -->
    <div class="frame">
        <nav class="navbar-custom">

            <a href="{{ url('/') }}" class="bday-reminder text-decoration-none">
                <i class="bi bi-cake2-fill brand-icon"></i>
                <span class="brand-black">Bday</span><span class="brand-red">-Reminder</span>
            </a>

            <div class="nav-menu">
                <a href="#features" class="nav-link-custom">Features</a>
                <a href="#preview" class="nav-link-custom">Preview</a>

                <a href="{{ route('admin.login') }}" class="login-button">
                    Login
                </a>
            </div>

        </nav>
    </div>

    <!-- DASHBOARD PREVIEW FRAME -->
    <div class="frame-2" id="preview">

        <div class="main-container"></div>

        <!-- Decorative Figma blocks -->
        <div class="preview-main"></div>
        <div class="preview-small-left"></div>
        <div class="preview-small-right"></div>
        <div class="preview-side"></div>
        <div class="preview-bottom"></div>

        <a href="{{ route('dashboard') }}" class="dashboard-preview-link">
            <div class="page-title">Dashboard Preview</div>
        </a>


        <!-- REAL DASHBOARD DATA -->
        <div class="real-dashboard-preview">

            
        <!-- STATISTICS -->
            
<div class="real-stat-grid">

    <a href="{{ route('customers.index') }}"
       class="real-stat-card total">

        <div class="real-stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <div class="real-stat-label">Total Nasabah</div>
        <div class="real-stat-number">{{ $totalNasabah }}</div>
    </a>

    <a href="{{ route('dashboard', ['month' => now()->month]) }}"
       class="real-stat-card birthday">

        <div class="real-stat-icon">
            <i class="bi bi-calendar-event"></i>
        </div>

        <div class="real-stat-label">Ulang Tahun Bulan Ini</div>
        <div class="real-stat-number">{{ $ulangTahunBulanIni }}</div>
    </a>

    <a href="{{ route('dashboard') }}"
       class="real-stat-card today">

        <div class="real-stat-icon">
            <i class="bi bi-bell-fill"></i>
        </div>

        <div class="real-stat-label">Jadwal Hari Ini</div>
        <div class="real-stat-number">{{ $reminderHariIni }}</div>
    </a>

    <a href="{{ route('log-reminder.index') }}"
       class="real-stat-card sent">

        <div class="real-stat-icon">
            <i class="bi bi-envelope-check-fill"></i>
        </div>

        <div class="real-stat-label">Jadwal Terkirim</div>
        <div class="real-stat-number">{{ $reminderTerkirim }}</div>
    </a>

</div>

        <!-- SIDE CARD -->
        <div class="side-card">
        </div>

    </div>

    <!-- FEATURES -->
    <section class="features-section" id="features">

        <div class="features-title">
            <h2>Features</h2>
            <p>Fitur utama Birthday Reminder System</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4>Customer Management</h4>
                <p>
                    Kelola data nasabah dengan lebih mudah dan terorganisir.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-cake2-fill"></i>
                </div>
                <h4>Birthday Tracking</h4>
                <p>
                    Pantau tanggal ulang tahun nasabah berdasarkan bulan.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-bell-fill"></i>
                </div>
                <h4>Automatic Reminder</h4>
                <p>
                    Kirim reminder ulang tahun secara otomatis melalui email.
                </p>
            </div>

        </div>
    </section>

</div>

<!-- FOOTER -->
<footer>
    <i class="bi bi-shield-check me-1"></i>
    &copy; {{ date('Y') }} Birthday Reminder System. All rights reserved.
</footer>

</body>
</html>