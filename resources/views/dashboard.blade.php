
@extends('layouts.app')

@section('title', 'Dashboard Birthday Reminder')

@push('styles')
<style>
    /* =========================
       DASHBOARD
    ========================= */
    .dashboard-page {
        width: 100%;
        min-height: 100%;
        color: #111;
        font-family: 'Inter', 'Helvetica', sans-serif;
    }

    .dashboard-page * {
        box-sizing: border-box;
    }

    /* =========================
       HEADER
    ========================= */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .dashboard-title h1 {
        margin: 0;
        color: #000;
        font-family: 'Coolvetica', 'Inter', sans-serif;
        font-size: 45px;
        font-weight: 500;
        line-height: 1.1;
    }

    .dashboard-title p {
        margin: 8px 0 0;
        color: #606060;
        font-size: 14px;
    }

    .logout-form {
        margin: 0;
    }

    .logout-form button {
        min-width: 100px;
        height: 40px;
        padding: 0 20px;
        border: none;
        border-radius: 40px;
        background: #2F2F2F;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .logout-form button:hover {
        background: #000;
        transform: translateY(-2px);
    }

    /* =========================
       STAT CARDS
       Setiap kartu berdiri sendiri
       dan bisa diklik
    ========================= */
    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        min-width: flex-start;
        min-height: 205px;
        padding: 28px 32px;
        background: #EEEEEE;
        border: 1px solid transparent;
        border-radius: 20px;
        color: #000;
        text-decoration: none;
        overflow: hidden;
        transition: transform 0.25s ease,
                    box-shadow 0.25s ease,
                    background 0.25s ease;
    }

    .stat-card:hover {
        color: #000;
        background: #e2e2e2;
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.10);
    }

    .stat-card:focus-visible {
        outline: 3px solid #2d3766;
        outline-offset: 3px;
    }

    .stat-icon {
        width: 62px;
        height: 62px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        background: #fff;
        border-radius: 50%;
        color: #2d3766;
        font-size: 27px;
    }

    .stat-card h3 {
        margin: 0;
        color: #000;
        font-size: 21px;
        font-weight: 500;
        line-height: 1.3;
    }

    .stat-card h2 {
        margin: 8px 0 0;
        color: #000;
        font-size: 42px;
        font-weight: 700;
        line-height: 1;
    }

    .stat-card .card-link-hint {
        margin-top: 12px;
        color: #555;
        font-size: 12px;
    }

    /* =========================
       BIRTHDAY SECTION
    ========================= */
    .birthday-section {
        min-width: 0;
        padding: 28px;
        background: #EEEEEE;
        border-radius: 20px;
    }

    .birthday-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 22px;
    }

    .birthday-header h2 {
        margin: 0;
        color: #000;
        font-size: 24px;
        font-weight: 700;
    }

    .birthday-header p {
        margin: 6px 0 0;
        color: #606060;
        font-size: 13px;
    }

    /* =========================
       MONTH FILTER
    ========================= */
    .month-filter {
        flex-shrink: 0;
        margin: 0;
    }

    .month-select {
        width: 160px;
        height: 38px;
        padding: 0 12px;
        background: #fff;
        border: 1px solid #777;
        border-radius: 10px;
        color: #000;
        font-size: 13px;
        cursor: pointer;
        outline: none;
    }

    .month-select:focus {
        border-color: #2d3766;
        box-shadow: 0 0 0 3px rgba(45, 55, 102, 0.12);
    }

    /* =========================
       BIRTHDAY CONTENT
    ========================= */
    .birthday-content {
        display: flex;
        flex-direction: column;
        gap: 18px;
        min-width: 0;
    }

    .month-group {
        min-width: 0;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
    }

    .month-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        min-height: 62px;
        padding: 15px 24px;
        background: #2d3766;
        color: #fff;
    }

    .month-title span {
        font-size: 22px;
        font-weight: 700;
    }

    .month-title small {
        font-size: 12px;
        font-weight: 400;
        opacity: 0.9;
    }

    .birthday-list {
        background: #fff;
    }

    /* =========================
       BIRTHDAY ITEM
    ========================= */
    .birthday-item {
        display: flex;
        align-items: center;
        gap: 0;
        min-height: 85px;
        padding: 14px 24px;
        border-bottom: 1px solid #eee;
        transition: background 0.2s ease;
    }

    .birthday-item:last-child {
        border-bottom: none;
    }

    .birthday-item:hover {
        background: #f7f7f7;
    }

    .birthday-date {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 76px;
        min-width: 76px;
    }

    .birthday-date strong {
        color: #000;
        font-size: 25px;
        font-weight: 700;
        line-height: 1;
    }

    .birthday-date span {
        margin-top: 5px;
        color: #606060;
        font-size: 11px;
        text-transform: uppercase;
    }

    .birthday-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        min-width: 42px;
        margin-right: 16px;
        background: #e3e3e3;
        border-radius: 50%;
        color: #2d3766;
        font-size: 18px;
    }

    .birthday-info {
        flex: 1;
        min-width: 0;
    }

    .birthday-info strong {
        display: block;
        overflow: hidden;
        color: #000;
        font-size: 14px;
        font-weight: 600;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .birthday-info span {
        display: block;
        margin-top: 5px;
        color: #606060;
        font-size: 11px;
    }

    .birthday-company {
        display: flex;
        align-items: center;
        width: 220px;
        min-width: 220px;
        padding-left: 15px;
        color: #606060;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    .birthday-company i {
        flex-shrink: 0;
        margin-right: 8px;
        font-size: 17px;
    }

    /* =========================
       EMPTY STATE
    ========================= */
    .empty-birthday {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 300px;
        padding: 40px 20px;
        background: #fff;
        border-radius: 18px;
        color: #606060;
        text-align: center;
    }

    .empty-birthday i {
        color: #999;
        font-size: 42px;
    }

    .empty-birthday h3 {
        margin: 15px 0 0;
        color: #444;
        font-size: 18px;
        font-weight: 600;
    }

    .empty-birthday p {
        margin: 7px 0 0;
        color: #777;
        font-size: 13px;
    }

    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 1100px) {
        .dashboard-title h1 {
            font-size: 38px;
        }

        .birthday-company {
            width: 180px;
            min-width: 180px;
        }

        .birthday-section {
            padding: 22px;
        }
    }

    @media (max-width: 900px) {
        .dashboard-cards {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .stat-card {
            padding: 22px;
        }

        .stat-card h3 {
            font-size: 18px;
        }

        .stat-card h2 {
            font-size: 36px;
        }

        .birthday-company {
            display: none;
        }
    }

    @media (max-width: 600px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .dashboard-title h1 {
            font-size: 32px;
        }

        .logout-form,
        .logout-form button {
            width: 100%;
        }

        .dashboard-cards {
            grid-template-columns: 1fr;
        }

        .stat-card {
            min-height: 175px;
        }

        .birthday-section {
            padding: 16px;
        }

        .birthday-header {
            flex-direction: column;
            align-items: stretch;
        }

        .month-filter,
        .month-select {
            width: 100%;
        }

        .month-select {
            height: 40px;
        }

        .month-title {
            padding: 14px 16px;
        }

        .month-title span {
            font-size: 19px;
        }

        .birthday-item {
            padding: 14px 12px;
        }

        .birthday-date {
            width: 52px;
            min-width: 52px;
        }

        .birthday-date strong {
            font-size: 21px;
        }

        .birthday-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            margin-right: 10px;
            font-size: 15px;
        }

        .birthday-info strong {
            font-size: 12px;
        }

        .birthday-info span {
            font-size: 10px;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-page">

    {{-- DASHBOARD HEADER --}}
    <div class="dashboard-header">
        <div class="dashboard-title">
            <h1>Dashboard</h1>
            <p>Ringkasan data dan ulang tahun nasabah</p>
        </div>

        <form
            class="logout-form"
            method="POST"
            action="{{ url('/admin/logout') }}"
        >
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-right me-1"></i>
                Logout
            </button>
        </form>
    </div>

    {{-- STAT CARDS: MASING-MASING BISA DIKLIK --}}
    <div class="dashboard-cards">

        <a
            href="{{ route('customers.index') }}"
            class="stat-card"
            aria-label="Lihat seluruh data nasabah"
        >
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <h3>Total Nasabah</h3>
            <h2>{{ $totalNasabah }}</h2>
            <span class="card-link-hint">
                Lihat data nasabah <i class="bi bi-arrow-up-right"></i>
            </span>
        </a>

        <a
            href="{{ route('dashboard', ['month' => now()->month]) }}"
            class="stat-card"
            aria-label="Lihat ulang tahun bulan ini"
        >
            <div class="stat-icon">
                <i class="bi bi-calendar2-event-fill"></i>
            </div>

            <h3>Total Ulang Tahun Bulan Ini</h3>
            <h2>{{ $birthdayThisMonth }}</h2>
            <span class="card-link-hint">
                Lihat ulang tahun bulan ini
                <i class="bi bi-arrow-up-right"></i>
            </span>
        </a>

    </div>

    {{-- BIRTHDAY SECTION --}}
    <div class="birthday-section">

        <div class="birthday-header">
            <div>
                <h2>Daftar Ulang Tahun</h2>
                <p>Daftar ulang tahun nasabah berdasarkan bulan</p>
            </div>

            {{-- MONTH FILTER --}}
            <form
                class="month-filter"
                method="GET"
                action="{{ route('dashboard') }}"
            >
                <select
                    name="month"
                    class="month-select"
                    aria-label="Pilih bulan ulang tahun"
                    onchange="this.form.submit()"
                >
                    <option value="">Semua Bulan</option>

                    @php
                        $months = [
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember',
                        ];
                    @endphp

                    @foreach($months as $number => $month)
                        <option
                            value="{{ $number }}"
                            {{ (int) $selectedMonth === (int) $number && $selectedMonth !== '' && $selectedMonth !== null ? 'selected' : '' }}
                        >
                            {{ $month }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- BIRTHDAY DATA --}}
        @if($birthdayGroups->count() > 0)

            <div class="birthday-content">

                @foreach($birthdayGroups as $monthNumber => $nasabahs)

                    <div class="month-group">

                        <div class="month-title">
                            <span>
                                {{ $months[$monthNumber] ?? 'Bulan' }}
                            </span>

                            <small>
                                {{ $nasabahs->count() }} ulang tahun
                            </small>
                        </div>

                        <div class="birthday-list">

                            @foreach($nasabahs as $nasabah)

                                <div class="birthday-item">

                                    <div class="birthday-date">
                                        <strong>
                                            {{ \Carbon\Carbon::parse($nasabah->tanggal_lahir)->format('d') }}
                                        </strong>

                                        <span>
                                            {{ \Carbon\Carbon::parse($nasabah->tanggal_lahir)->translatedFormat('M') }}
                                        </span>
                                    </div>

                                    <div class="birthday-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div class="birthday-info">
                                        <strong title="{{ $nasabah->nama }}">
                                            {{ $nasabah->nama }}
                                        </strong>

                                        <span>
                                            {{ $nasabah->jabatan ?? $nasabah->posisi ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="birthday-company">
                                        <i class="bi bi-building"></i>
                                        <span>
                                            {{ $nasabah->perusahaan ?? '-' }}
                                        </span>
                                    </div>

                                </div>

                            @endforeach

                        </div>
                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-birthday">
                <i class="bi bi-calendar-x"></i>

                <h3>Tidak ada data ulang tahun</h3>

                <p>
                    Belum ada nasabah yang berulang tahun pada bulan yang dipilih.
                </p>
            </div>

        @endif

    </div>
</div>
@endsection