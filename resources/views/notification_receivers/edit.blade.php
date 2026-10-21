@extends('layouts.app')

@section('title','Edit Penerima Notifikasi')

@section('content')

<div class="card shadow rounded-4">

    <div class="card-header bg-white">
        <h4>
            Edit Penerima Notifikasi
        </h4>
    </div>


    <div class="card-body">


<form action="{{ route('notification-receivers.update',$receiver->id) }}"
      method="POST">

@csrf
@method('PUT')


<div class="mb-3">

<label class="form-label">
Nama
</label>

<input 
type="text"
name="name"
class="form-control"
value="{{ $receiver->name }}"
required>

</div>



<div class="mb-3">

<label class="form-label">
Email
</label>

<input 
type="email"
name="email"
class="form-control"
value="{{ $receiver->email }}"
required>

</div>



<button class="btn btn-primary">
Update
</button>


<a href="{{ route('notification-receivers.index') }}"
class="btn btn-secondary">
Kembali
</a>


</form>
</div>
</div>
@endsection