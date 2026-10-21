@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Dashboard
</h2>

<div class="row">

    <div class="col-md-4">

        <div class="card shadow p-4">

            <h5>Total Nasabah</h5>

            <h1>{{ $totalCustomer }}</h1>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow p-4">

            <h5>Ultah Hari Ini</h5>

            <h1>0</h1>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow p-4">

            <h5>Reminder Terkirim</h5>

            <h1>0</h1>

        </div>

    </div>

</div>

@endsection