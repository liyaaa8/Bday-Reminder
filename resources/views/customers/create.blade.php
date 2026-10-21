@extends('layouts.app')

@section('title', 'Tambah Nasabah')

@section('content')

<style>
    .form-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    .form-header {
        padding: 22px 25px;
        background: #ffffff;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #eeeeee;
    }

    .form-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #2F2F2F;
        font-size: 20px;
        font-weight: 600;
    }

    .form-title i {
        color: #FFB700;
    }

    .form-body {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #444;
        font-size: 14px;
        font-weight: 600;
    }

    .form-control-custom {
        width: 100%;
        padding: 11px 14px;
        border: 1px solid #dddddd;
        border-radius: 10px;
        background: #ffffff;
        color: #333;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #FFB700;
        box-shadow: 0 0 0 3px rgba(255, 183, 0, 0.12);
    }

    .form-control-custom::placeholder {
        color: #999;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
    }

    .btn-simpan {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: #2F2F2F;
        color: #ffffff;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .btn-simpan:hover {
        background: #494949;
        color: #ffffff;
        transform: translateY(-2px);
    }

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: #f1f1f1;
        color: #555;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .btn-kembali:hover {
        background: #e3e3e3;
        color: #2F2F2F;
    }

    @media (max-width: 650px) {
        .form-header {
            padding: 20px;
        }

        .form-body {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-simpan,
        .btn-kembali {
            width: 100%;
        }
    }
</style>

<div class="form-card">

<div class="form-header">
    <h1 class="form-title">
        <i class="bi bi-person-plus-fill"></i>
        Tambah Nasabah
    </h1>
</div>

<div class="form-body">

    <form action="{{ route('customers.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>

            <input
                type="text"
                id="nama"
                name="nama"
                class="form-control-custom"
                placeholder="Masukkan nama"
                value="{{ old('nama') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>

            <input
                type="text"
                id="jabatan"
                name="jabatan"
                class="form-control-custom"
                placeholder="Contoh: Manager"
                value="{{ old('jabatan') }}"
            >
        </div>

        <div class="form-group">
            <label for="perusahaan">Institusi</label>

            <input
                type="text"
                id="perusahaan"
                name="perusahaan"
                class="form-control-custom"
                placeholder="Nama perusahaan / instansi"
                value="{{ old('perusahaan') }}"
            >
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>

            <input
                type="date"
                id="tanggal_lahir"
                name="tanggal_lahir"
                class="form-control-custom"
                value="{{ old('tanggal_lahir') }}"
                required
            >
        </div>

        <div class="form-actions">

            <button
                type="submit"
                class="btn-simpan"
            >
                <i class="bi bi-check-circle-fill"></i>
                Simpan
            </button>

            <a
                href="{{ route('customers.index') }}"
                class="btn-kembali"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

    </form>

</div>

</div>

@endsection
