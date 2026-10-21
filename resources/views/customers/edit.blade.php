@extends('layouts.app')

@section('title', 'Edit Nasabah')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-pencil-square text-warning"></i>
                Edit Nasabah
            </h3>

            <a href="{{ route('customers.index') }}" class="btn btn-secondary rounded-3">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

        <div class="card-body">

            <form action="{{ route('customers.update',$nasabah->id) }}" method="POST">

                @csrf
                @method('PUT')



                <div class="mb-3">

                    <label class="form-label fw-semibold">Nama</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name',$nasabah->name) }}"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">Jabatan</label>

                    <input
                        type="text"
                        name="position"
                        value="{{ old('position',$nasabah->position) }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">Perusahaan</label>

                    <input
                        type="text"
                        name="institution"
                        value="{{ old('institution',$nasabah->institution) }}"
                        class="form-control">

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">Tanggal Lahir</label>

                    <input
                        type="date"
                        name="birth_date"
                        value="{{ old('birth_date',$nasabah->birth_date) }}"
                        class="form-control"
                        required>

                </div>

                <button class="btn btn-warning rounded-3">
                    <i class="bi bi-check-circle-fill"></i>
                    Update Data
                </button>

                <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary rounded-3">
                    Batal
                </a>

            </form>

        </div>

    </div>

</div>

@endsection