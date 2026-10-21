<!DOCTYPE html>
<html>
<head>
    <title>Birthday Reminder</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f7fb; padding:20px;">

<div style="background:white; padding:25px; border-radius:15px; max-width:600px; margin:auto;">

<h2 style="color:#FFAAB8;">
🎂 Birthday Reminder
</h2>

<p>
Halo <b>{{ $receiver->name }}</b>,
</p>

<p>
Besok adalah ulang tahun salah satu nasabah. Silakan memberikan ucapan selamat ulang tahun.
</p>


<table width="100%" cellpadding="10" cellspacing="0" 
style="border-collapse:collapse; margin-top:20px;">

<tr style="background:#fce4ec;">
<td><b>Nama</b></td>
<td>{{ $customer->nama }}</td>
</tr>

<tr>
<td><b>Jabatan</b></td>
<td>{{ $customer->jabatan ?? '-' }}</td>
</tr>

<tr style="background:#fce4ec;">
<td><b>Perusahaan</b></td>
<td>{{ $customer->perusahaan ?? '-' }}</td>
</tr>

<tr>
<td><b>Tanggal Lahir</b></td>
<td>
{{ \Carbon\Carbon::parse($customer->tanggal_lahir)->format('d F Y') }}
</td>
</tr>

</table>


<br>

<p>
Terima kasih.
</p>

<p style="color:#777;">
Sistem Birthday Reminder
</p>


</div>

</body>
</html>