@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Auth;

    $isAdmin = Auth::guard('admin')->check()
        && Auth::guard('admin')->user()->role === 'admin';
@endphp

@section('title', 'Data Nasabah')

@section('content')

<style>
    /* ========================================
       PAGE CARD
    ======================================== */

    .page-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }


    /* ========================================
       PAGE HEADER
    ======================================== */

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


    .page-title i {
        font-size: 21px;
    }


    /* ========================================
       PAGE BODY
    ======================================== */

    .page-body {
        padding: 25px;
    }


    /* ========================================
       BUTTON TAMBAH
    ======================================== */

    .btn-page {
        display: inline-flex;
        align-items: center;
        justify-content: center;
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


    .btn-page:hover {
        background: #494949;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    }


    /* ========================================
       SEARCH
    ======================================== */

    .search-area {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
    }


    .search-form {
        display: flex;
        width: 100%;
        max-width: 500px;
    }


    .search-input {
        height: 42px;
        border: 1px solid #dcdcdc;
        border-right: none;
        border-radius: 9px 0 0 9px;
        padding: 0 14px;
        font-size: 13px;
        outline: none;
        box-shadow: none;
    }


    .search-input:focus {
        border-color: #999;
        box-shadow: none;
    }


    .search-button {
        width: 48px;
        height: 42px;
        border: none;
        background: #2F2F2F;
        color: white;
        border-radius: 0 9px 9px 0;
        transition: 0.25s ease;
    }


    .search-button:hover {
        background: #494949;
    }


    .btn-reset {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f1f1;
        color: #666;
        border-radius: 9px;
        text-decoration: none;
        transition: 0.25s ease;
    }


    .btn-reset:hover {
        background: #e5e5e5;
        color: #333;
    }


    /* ========================================
       ALERT
    ======================================== */

    .page-alert {
        border-radius: 10px;
        font-size: 13px;
        margin-bottom: 20px;
    }


    /* ========================================
       TABLE
    ======================================== */

    .table-wrapper {
        overflow-x: auto;
    }


    .page-table {
        width: 100%;
        margin: 0;
        vertical-align: middle;
        min-width: 800px;
    }


    .page-table thead th {
        background: #f8f8f8;
        color: #555;
        font-size: 13px;
        font-weight: 600;
        padding: 14px 15px;
        border-bottom: 1px solid #e9e9e9;
        white-space: nowrap;
    }


    .page-table tbody td {
        padding: 15px;
        color: #444;
        font-size: 13px;
        border-bottom: 1px solid #eeeeee;
        vertical-align: middle;
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


    /* ========================================
       NOMOR
    ======================================== */

    .number-cell {
        width: 60px;
        color: #777 !important;
        font-weight: 500;
    }


    /* ========================================
       TANGGAL
    ======================================== */

    .date-cell {
        white-space: nowrap;
    }


    /* ========================================
       ACTION
    ======================================== */

    .action-cell {
        width: 160px;
        white-space: nowrap;
    }


    .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;
    }


    .btn-edit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        background: #2F2F2F;
        color: white !important;
        padding: 7px 12px;
        border: none;
        border-radius: 7px;
        text-decoration: none !important;
        font-size: 12px;
        font-weight: 500;
        transition: 0.25s ease;
    }


    .btn-edit:hover {
        background: #494949;
        color: white !important;
        transform: translateY(-1px);
    }


    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        background: #ff6b6b;
        color: white;
        padding: 7px 12px;
        border: none;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 500;
        transition: 0.25s ease;
    }


    .btn-delete:hover {
        background: #e74c3c;
        color: white;
        transform: translateY(-1px);
    }


    /* ========================================
       EMPTY DATA
    ======================================== */

    .empty-data {
        text-align: center;
        padding: 50px 20px;
        color: #888;
    }


    .empty-data i {
        display: block;
        font-size: 40px;
        margin-bottom: 12px;
        color: #bbb;
    }


    .empty-data p {
        margin: 0;
        font-size: 13px;
    }


    /* ========================================
       RESPONSIVE
    ======================================== */

    @media (max-width: 768px) {

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }


        .page-body {
            padding: 15px;
        }


        .btn-page {
            width: 100%;
        }


        .search-form {
            max-width: none;
        }

    }
</style>


<div class="page-card">

    {{-- ========================================
         HEADER
    ======================================== --}}

    <div class="page-header">

        <h4 class="page-title">

            <i class="bi bi-people-fill"></i>

            Data Nasabah

        </h4>


        {{-- HANYA ADMIN --}}

        @if($isAdmin)

            <a
                href="{{ route('customers.create') }}"
                class="btn-page"
            >

                <i class="bi bi-plus-lg"></i>

                Tambah Nasabah

            </a>

        @endif

    </div>


    {{-- ========================================
         BODY
    ======================================== --}}

    <div class="page-body">


        {{-- ========================================
             SEARCH
        ======================================== --}}

        <div class="search-area">

            <form
                method="GET"
                action="{{ route('customers.index') }}"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="form-control search-input"
                    placeholder="Cari nama..."
                    value="{{ request('search') }}"
                >


                <button
                    type="submit"
                    class="search-button"
                    title="Cari"
                >

                    <i class="bi bi-search"></i>

                </button>

            </form>


            @if(request('search'))

                <a
                    href="{{ route('customers.index') }}"
                    class="btn-reset"
                    title="Reset pencarian"
                >

                    <i class="bi bi-x-lg"></i>

                </a>

            @endif

        </div>


        {{-- ========================================
             SUCCESS
        ======================================== --}}

        @if(session('success'))

            <div class="alert alert-success page-alert">

                {{ session('success') }}

            </div>

        @endif


        {{-- ========================================
             ERROR
        ======================================== --}}

        @if(session('error'))

            <div class="alert alert-danger page-alert">

                {{ session('error') }}

            </div>

        @endif


        {{-- ========================================
             TABLE
        ======================================== --}}

        <div class="table-wrapper">

            <table class="table page-table">

                <thead>

                    <tr>

                        <th class="number-cell">
                            No
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Jabatan
                        </th>

                        <th>
                            Perusahaan
                        </th>

                        <th>
                            Tanggal Lahir
                        </th>


                        @if($isAdmin)

                            <th class="action-cell">
                                Aksi
                            </th>

                        @endif

                    </tr>

                </thead>


                <tbody>

                    @forelse($nasabah as $item)

                        <tr>

                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                {{ $item->nama }}
                            </td>


                            <td>
                                {{ $item->jabatan ?? '-' }}
                            </td>


                            <td>
                                {{ $item->perusahaan ?? '-' }}
                            </td>


                            <td class="date-cell">
                                {{ $item->tanggal_lahir ?? '-' }}
                            </td>


                            {{-- AKSI ADMIN --}}

                            @if($isAdmin)

                                <td class="action-cell">

                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('customers.edit', $item->id) }}"
                                            class="btn-edit"
                                        >

                                            <i class="bi bi-pencil-fill"></i>

                                            Edit

                                        </a>


                                        <form
                                            action="{{ route('customers.destroy', $item->id) }}"
                                            method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                            >

                                                <i class="bi bi-trash-fill"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            @endif

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="{{ $isAdmin ? 6 : 5 }}"
                                class="p-0"
                            >

                                <div class="empty-data">

                                    <i class="bi bi-inbox"></i>

                                    <p>

                                        @if(request('search'))

                                            Data nasabah yang dicari tidak ditemukan.

                                        @else

                                            Belum ada data nasabah.

                                        @endif

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection