@extends('layouts.app')


@section('title', 'Import Excel')


@section('content')


<style>

    /* =====================================================
       IMPORT PAGE
    ===================================================== */

    .import-page {
        max-width: 1000px;
        margin: 0 auto;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        color: #2F2F2F;
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: #64748b;
        font-size: 14px;
        margin: 7px 0 0;
    }


    /* =====================================================
       IMPORT CARD
    ===================================================== */

    .import-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #eeeeee;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
        overflow: hidden;
    }


    .import-card-header {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 22px 25px;

        border-bottom: 1px solid #eeeeee;
    }


    .import-icon {
        width: 45px;
        height: 45px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #EEEEEE;
        color: #052E76;

        font-size: 21px;
    }


    .import-card-header h4 {
        margin: 0;

        color: #2F2F2F;

        font-size: 18px;
        font-weight: 600;
    }


    .import-card-body {
        padding: 30px 25px;
    }


    /* =====================================================
       ALERT
    ===================================================== */

    .import-alert {
        border-radius: 10px;
        font-size: 13px;
        margin-bottom: 20px;
    }


    /* =====================================================
       FILE INPUT
    ===================================================== */

    .file-label {
        display: block;

        color: #2F2F2F;

        font-size: 13px;
        font-weight: 600;

        margin-bottom: 8px;
    }


    .file-input {
        width: 100%;

        padding: 11px 13px;

        border: 1px solid #dddddd;

        border-radius: 10px;

        font-family: 'Plus Jakarta Sans', sans-serif;

        font-size: 13px;

        background: #ffffff;

        cursor: pointer;

        transition: .2s ease;
    }


    .file-input:focus {
        outline: none;

        border-color: #FFB700;

        box-shadow:
            0 0 0 3px rgba(255, 183, 0, .15);
    }


    /* =====================================================
       INFO
    ===================================================== */

    .import-info {
        margin-top: 12px;

        color: #888;

        font-size: 12px;
    }


    .import-info i {
        margin-right: 5px;
    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .btn-import {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        margin-top: 22px;

        padding: 11px 20px;

        background: #2F2F2F;

        color: #ffffff;

        border: none;

        border-radius: 9px;

        font-family: 'Plus Jakarta Sans', sans-serif;

        font-size: 13px;

        font-weight: 600;

        cursor: pointer;

        transition: .25s ease;
    }


    .btn-import:hover {
        background: #494949;

        color: #ffffff;

        transform: translateY(-2px);

        box-shadow:
            0 8px 18px rgba(0, 0, 0, .12);
    }


    /* =====================================================
       FORMAT INFO
    ===================================================== */

    .format-info {
        margin-top: 25px;

        padding: 18px;

        background: #fafafa;

        border: 1px solid #eeeeee;

        border-radius: 12px;
    }


    .format-info h6 {
        margin: 0 0 8px;

        color: #2F2F2F;

        font-size: 13px;

        font-weight: 600;
    }


    .format-info p {
        margin: 0;

        color: #777;

        font-size: 12px;

        line-height: 1.7;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .import-page {
            max-width: 100%;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .import-card-body {
            padding: 22px 18px;
        }

        .import-card-header {
            padding: 18px;
        }

    }

</style>



<div class="import-page">


    <!-- =====================================================
         PAGE HEADER
    ===================================================== -->

    <div class="page-header">

        <h1>
            Import Data
        </h1>

        <p>
            Upload data nasabah dari file Excel atau CSV.
        </p>

    </div>



    <!-- =====================================================
         IMPORT CARD
    ===================================================== -->

    <div class="import-card">


        <!-- HEADER -->

        <div class="import-card-header">

            <div class="import-icon">

                <i class="bi bi-file-earmark-excel-fill"></i>

            </div>


            <h4>
                Import Data Nasabah
            </h4>

        </div>



        <!-- BODY -->

        <div class="import-card-body">


            <!-- SUCCESS -->

            @if(session('success'))

                <div class="alert alert-success import-alert">

                    <i class="bi bi-check-circle-fill me-1"></i>

                    {{ session('success') }}

                </div>

            @endif



            <!-- ERROR -->

            @if(session('error'))

                <div class="alert alert-danger import-alert">

                    <i class="bi bi-exclamation-circle-fill me-1"></i>

                    {{ session('error') }}

                </div>

            @endif



            <!-- VALIDATION ERROR -->

            @if($errors->any())

                <div class="alert alert-danger import-alert">

                    <strong>
                        Terjadi kesalahan:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- =================================================
                 FORM
            ================================================== -->

            <form
                method="POST"
                action="{{ route('import.store') }}"
                enctype="multipart/form-data"
            >

                @csrf


                <label
                    for="file"
                    class="file-label"
                >
                    Pilih File
                </label>


                <input
                    type="file"
                    id="file"
                    name="file"
                    class="file-input"
                    accept=".xlsx,.xls,.csv"
                    required
                >


                <div class="import-info">

                    <i class="bi bi-info-circle"></i>

                    Pilih file Excel atau CSV yang berisi data nasabah.

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="btn-import"
                >

                    <i class="bi bi-upload"></i>

                    Upload & Import

                </button>


            </form>



            <!-- =================================================
                 FORMAT INFO
            ================================================== -->

            <div class="format-info">

                <h6>
                    <i class="bi bi-info-circle me-1"></i>
                    Format data
                </h6>

                <p>
                    Pastikan file memiliki kolom:
                    <strong>Nama</strong>,
                    <strong>Jabatan</strong>,
                    <strong>Perusahaan</strong>,
                    dan <strong>Tanggal Lahir</strong>.
                </p>

            </div>


        </div>

    </div>


</div>


@endsection