<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Birthday Reminder System')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }


        body {
            background: #f5f7fb;
            min-height: 100vh;
        }

        
/* =========================
   SIDEBAR
========================= */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background: #2F2F2F;
    padding: 26px 14px;
    z-index: 1000;
    overflow-y: auto;
}

/* LOGO / TITLE */
.sidebar-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 34px;
    padding: 0 6px;
}

.sidebar-brand i {
    flex-shrink: 0;
    font-size: 22px;
}

.sidebar-brand span {
    line-height: 1.25;
}

/* MENU */
.menu {
    display: flex;
    flex-direction: column;
    gap: 5px;
    width: 100%;
}

.menu a {
    display: flex;
    align-items: center;
    gap: 11px;
    width: 100%;
    min-height: 43px;
    padding: 10px 13px;
    margin: 0;
    border-radius: 9px;
    color: #E8E8E8;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: background 0.2s ease, color 0.2s ease;
}

.menu a i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 19px;
    width: 19px;
    font-size: 17px;
    line-height: 1;
}

.menu a span {
    line-height: 1.4;
}

.menu a:hover {
    background: #454545;
    color: #fff;
}

.menu a.active {
    background: #505050;
    color: #fff;
    font-weight: 600;
}

/* =========================
   MAIN CONTENT
========================= */
.content {
    margin-left: 230px;
    min-height: 100vh;
    padding: 30px;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 900px) {
    .sidebar {
        width: 210px;
    }

    .content {
        margin-left: 210px;
        padding: 24px;
    }
}

@media (max-width: 700px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
        min-height: auto;
        padding: 18px;
    }

    .sidebar-brand {
        margin-bottom: 18px;
    }

    .menu {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 6px;
    }

    .menu a {
        width: auto;
        min-height: 40px;
        padding: 9px 11px;
    }

    .content {
        margin-left: 0;
        padding: 18px;
    }
}

        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .content {

            margin-left: 260px;

            min-height: 100vh;

            padding: 35px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {

                width: 220px;
            }


            .content {

                margin-left: 220px;

                padding: 25px;
            }

        }


        @media (max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;

                min-height: auto;

                padding: 20px;
            }


            .sidebar-brand {

                margin-bottom: 20px;
            }


            .menu {

                display: flex;

                flex-wrap: wrap;

                gap: 8px;
            }


            .menu a {

                width: auto;

                margin-bottom: 0;
            }


            .content {

                margin-left: 0;

                padding: 20px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


        <a
            href="{{ route('dashboard') }}"
            class="sidebar-brand"
        >

            <span>
                Birthday Reminder
            </span>

        </a>


        <nav class="menu">

        <a href="{{ url('/') }}">
    <i class="bi bi-house-door-fill"></i>
    <span>Home</span>
</a>


            <!-- DASHBOARD -->

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
            <i class="bi bi-menu-button-wide-fill"></i>                <span>
                    Dashboard
                </span>

            </a>


            <!-- NASABAH -->

            <a
                href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.*') ? 'active' : '' }}"
            >

                <i class="bi bi-people-fill"></i>

                <span>
                    Nasabah
                </span>

            </a>


            <!-- IMPORT -->

            <a
                href="{{ route('import.index') }}"
                class="{{ request()->routeIs('import.*') ? 'active' : '' }}"
            >

                <i class="bi bi-file-earmark-arrow-down-fill"></i>

                <span>
                    Import
                </span>

            </a>


            <!-- REMINDER -->

            <a
                href="{{ route('notification-receivers.index') }}"
                class="{{ request()->routeIs('notification-receivers.*') ? 'active' : '' }}"
            >

                <i class="bi bi-bell-fill"></i>

                <span>
                    Reminder
                </span>

            </a>


        </nav>


    </aside>



    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <main class="content">

        @yield('content')

    </main>



    @stack('scripts')


</body>

</html>