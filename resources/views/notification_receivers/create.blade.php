<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Penerima Reminder</title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>


*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins;
}


body{

background:#f5f7fb;
display:flex;

}



.sidebar{

width:240px;
height:100vh;
background:#505050;
padding:25px;

}



.sidebar h2{

color:#FFB700;
margin-bottom:40px;

}



.sidebar a{

display:block;
text-decoration:none;
color:#2F2F2F;
padding:12px;
margin-bottom:10px;
border-radius:8px;

}


.sidebar a:hover{

background:#2F2F2F;
color:white;

}



.main{

flex:1;
padding:30px;

}



h1{

color:#2F2F2F;

}



.card{

background:white;
padding:30px;
margin-top:30px;
width:600px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.08);

}



label{

font-weight:600;

}



input{

width:100%;
padding:12px;
margin-top:8px;
margin-bottom:20px;
border:1px solid #ddd;
border-radius:10px;

}



button{

background:#2F2F2F;
color:white;
border:none;
padding:12px 25px;
border-radius:10px;
cursor:pointer;

}


button:hover{

background:#8dcc6e;

}


.back{

text-decoration:none;
color:#2F2F2F;

}


</style>


</head>


<body>



<div class="sidebar">


<a href="/dashboard">
<i class="bi bi-house-door-fill"></i>
Dashboard
</a>


<a href="/customers">
<i class="bi bi-people-fill"></i>
Nasabah
</a>


<a href="/import">
<i class="bi bi-file-earmark-excel-fill"></i>
Import
</a>


<a href="/notification-receivers">
<i class="bi bi-bell-fill"></i>
Reminder
</a>



</div>




<div class="main">


<h1>
<span>Tambah Penerima Reminder <i class="bi bi-bell-fill"></i>
  </span>
</h1>


<div class="card">


<form method="POST" action="{{ route('notification-receivers.store') }}">


@csrf


<label>
Nama Penerima
</label>


<input 
type="text"
name="name"
placeholder="Contoh: Andi"
required>



<label>
Email
</label>


<input
type="email"
name="email"
placeholder="contoh@email.com"
required>



<button>

<i class="bi bi-save"></i>

Simpan

</button>


<a href="/notification-receivers" class="back">

Kembali

</a>



</form>


</div>


</div>



</body>

</html>