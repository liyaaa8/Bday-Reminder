<!DOCTYPE html>
<html>

<head>

<style>

body{
    font-family: Coolvetica, sans-serif;
    background:#f4f4f4;
    padding:30px;
    margin:0;
}

.card{
    max-width:700px;
    margin:auto;
    background:#ffffff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
}

h2{
    color:#ff7b9c;
    text-align:center;
}

p{
    font-size:15px;
    color:#333;
    line-height:1.6;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

td{
    padding:10px;
    border:1px solid #ddd;
}

.label{
    width:35%;
    background:#f8f8f8;
    font-weight:bold;
}

.footer{
    margin-top:30px;
    text-align:center;
    color:#888;
    font-size:13px;
}

.banner{
    text-align:center;
    margin:20px 0;
}

.banner img{
    width:100%;
    max-width:650px;
    border-radius:8px;
}

</style>

</head>

<body>

<div class="card">

    <h2>🎂 Birthday Reminder</h2>

    <p>
        Halo <b>{{ $receiver->name }}</b>,
    </p>

    <p>
        Besok adalah ulang tahun salah satu nasabah.
        Mohon memberikan ucapan selamat ulang tahun kepada nasabah berikut.
    </p>

    <table>

        <tr>
            <td class="label">Nama</td>
            <td>{{ $customer->name }}</td>
        </tr>

        <tr>
            <td class="label">Jabatan</td>
            <td>{{ $customer->position }}</td>
        </tr>

        <tr>
            <td class="label">Perusahaan</td>
            <td>{{ $customer->Perusahaan }}</td>
        </tr>

        <tr>
            <td class="label">Tanggal Lahir</td>
            <td>{{ \Carbon\Carbon::parse($customer->birth_date)->format('d F Y') }}</td>
        </tr>

    </table>

    <p class="footer">
        Sistem Birthday Reminder
    </p>

</div>

</body>

</html>