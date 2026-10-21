<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Birthday Reminder')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        /* ================================
   STANDARD CARD
================================ */

.page-card {
    background: #ffffff;
    border: none;
    border-radius: 18px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}


/* ================================
   STANDARD HEADER
================================ */

.page-header {
    padding: 22px 25px;
    background: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eeeeee;
}

.page-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
    color: #2F2F2F;
    font-size: 20px;
    font-weight: 600;
}


/* ================================
   STANDARD BODY
================================ */

.page-body {
    padding: 25px;
}


/* ================================
   STANDARD TABLE
================================ */

.page-table {
    margin: 0;
    vertical-align: middle;
}

.page-table thead th {
    background: #f8f8f8;
    color: #555;
    font-size: 13px;
    font-weight: 600;
    padding: 14px 15px;
    border-bottom: 1px solid #e9e9e9;
}

.page-table tbody td {
    padding: 15px;
    color: #444;
    font-size: 13px;
    border-bottom: 1px solid #eeeeee;
}

.page-table tbody tr:last-child td {
    border-bottom: none;
}

.page-table tbody tr {
    transition: background 0.2s ease;
}

.page-table tbody tr:hover {
    background: #fafafa;
}


/* ================================
   BUTTON TAMBAH
================================ */

.btn-tambah {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #2F2F2F;
    color: white !important;
    padding: 10px 17px;
    border: none;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.25s ease;
}

.btn-tambah:hover {
    background: #494949;
    color: white !important;
    transform: translateY(-2px);
}

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        body {
            background: #f5f7fb;
            font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex;
        }
        


        /* ================================
           SIDEBAR
        ================================= */

        .sidebar {

            width: 260px;
            min-width: 260px;

            min-height: 100vh;
            height: 100vh;

            background: #2F2F2F;
            color: white;

            padding-top: 25px;
            padding-bottom: 20px;

            flex-shrink: 0;
        }


        .sidebar-title {

            padding: 0 25px 25px;

            color: white;

            text-align: center;

            font-size: 20px;
            font-weight: 700;

            margin-bottom: 15px;
        }


        .sidebar-title i {

            margin-right: 7px;

            color: #FFB700;
        }


        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            font-weight: 600;

            text-decoration: none;

            text-align: left;

            color: #ffffff;

            padding: 14px 25px;

            margin: 8px 15px;

            border-radius: 10px;

            transition:
                background 0.3s,
                color 0.3s;
        }


        .sidebar a:hover {

            background: #494949;

            color: white;
        }


        .sidebar a i {

            font-size: 18px;

            width: 20px;

            text-align: center;
        }


        /* ================================
           ROLE BADGE
        ================================= */

        .role-box {

            margin: 0 15px 25px;

            padding: 10px 15px;

            background: rgba(255, 255, 255, 0.08);

            border-radius: 10px;

            text-align: center;

            font-size: 12px;

            color: #d9d9d9;
        }


        .role-box strong {

            display: block;

            color: #FFB700;

            font-size: 13px;

            margin-top: 3px;
        }


        /* ================================
           SIDEBAR DIVIDER
        ================================= */

        .sidebar hr {

            margin: 25px 20px;

            border-color: rgba(255,255,255,0.15);
        }


        /* ================================
           CONTENT
        ================================= */

        .content {

            flex: 1;

            min-width: 0;

            margin: 0 !important;

            padding: 30px;

            overflow-x: hidden;
        }


        /* ================================
           LOGOUT
        ================================= */

        .logout-form {

            margin: 0 15px;
        }


        .btn-logout {

            background: #FFB700;

            border: none;

            color: #000;

            padding: 10px;

            border-radius: 10px;

            font-weight: 600;

            width: 100%;
        }


        .btn-logout:hover {

            background: #494949;

            color: white;
        }


        /* ================================
           TAMBAH BUTTON
        ================================= */

        .btn-tambah {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            background: #2F2F2F;

            color: white !important;

            padding: 10px 18px;

            border: none;

            border-radius: 8px;

            text-decoration: none !important;

            font-size: 14px;

            font-weight: 500;

            transition: 0.25s ease;
        }


        .btn-tambah:hover {

            background: #494949;

            color: white !important;

            transform: translateY(-2px);
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 800px) {

            .sidebar {

                width: 220px;

                min-width: 220px;
            }

            .content {

                padding: 20px;
            }
        }


        @media (max-width: 650px) {

            body {

                display: block;
            }

            .sidebar {

                width: 100%;

                min-width: 100%;

                height: auto;

                min-height: auto;
            }

            .content {

                width: 100%;

                padding: 20px;
            }
        }

    </style>

</head>


<body>


    {{-- SIDEBAR --}}

    <div class="sidebar">


        {{-- JUDUL --}}

        <div class="sidebar-title">

            Birthday Reminder

        </div>


        {{-- ROLE USER --}}

        @auth('admin')

            <div class="role-box">

                Login sebagai

                <strong>

                    @if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->role === 'admin')

                        <i class="bi bi-shield-fill-check"></i>
                        Administrator

                    @else

                        <i class="bi bi-person-fill"></i>
                        User

                    @endif

                </strong>

            </div>

        @endauth


        {{-- ================================
             MENU YANG BISA DIAKSES SEMUA
        ================================= --}}

        <a href="{{ route('dashboard') }}">

            <i class="bi bi-house-door-fill"></i>

            Dashboard

        </a>


        <a href="{{ route('customers.index') }}">

            <i class="bi bi-people-fill"></i>

            Nasabah

        </a>


        <a href="{{ route('log-reminder.index') }}">

            <i class="bi bi-clock-history"></i>

            Log Reminder

        </a>


        {{-- ================================
             MENU KHUSUS ADMIN
        ================================= --}}

        @if(\Illuminate\Support\Facades\Auth::guard('admin')->check() &&
            \Illuminate\Support\Facades\Auth::guard('admin')->user()->role === 'admin')

            <a href="{{ route('import.index') }}">

                <i class="bi bi-file-earmark-arrow-down-fill"></i>

                Import Excel

            </a>


            <a href="{{ route('notification-receivers.index') }}">

                <i class="bi bi-bell-fill"></i>

                Penerima Notifikasi

            </a>


            <a href="/send-reminder">

                <i class="bi bi-send-fill"></i>

                Kirim Reminder

            </a>

        @endif


        <hr>


        {{-- LOGOUT --}}

        <form
            method="POST"
            action="{{ route('admin.logout') }}"
            class="logout-form"
        >

            @csrf

            <button
                type="submit"
                class="btn btn-logout"
            >

                <i class="bi bi-box-arrow-right me-1"></i>

                Logout

            </button>

        </form>


    </div>


    {{-- CONTENT --}}

    <div class="content">

        @yield('content')

    </div>


</body>

</html>