<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Plus Jakarta Sans,sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;

    background:
        linear-gradient(
            rgba(225, 225, 225, 0.35),
            rgba(225, 225, 225, 0.35)
        ),
        url('/images/login-bg.jpeg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    display: flex;
    justify-content: center;
    align-items: center;
}

.login-box{

    width:400px;

    background:white;

    padding:40px;

    border-radius:20px;

    box-shadow:0 15px 40px rgba(0,0,0,.1);

}

.logo{

    text-align:center;

    margin-bottom:30px;

}

.logo i{

    font-size:60px;

    color:#052E76;

}

.logo h2{

    color:#2F2F2F;

    margin-top:10px;

}

.form-group{

    margin-bottom:20px;

}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-weight:600;

    color:#555;

}

.form-control{

    width:100%;

    padding:12px 15px;

    border:2px solid #eee;

    border-radius:10px;

    outline:none;

    transition:.3s;

    font-size:15px;

}

.form-control:focus{

    border-color:#2F2F2F;

}

.btn-login{

    width:100%;

    padding:14px;

    background:#2F2F2F;

    color:white;

    border:none;

    border-radius:10px;

    cursor:pointer;

    font-size:16px;

    font-weight:600;

    transition:.3s;

}

.btn-login:hover{

    background:#494949;

}

.error{

    background:#ffe5e5;

    color:#d60000;

    padding:10px;

    border-radius:8px;

    margin-bottom:20px;

}

.success{

    background:#e8f8e8;

    color:#267326;

    padding:10px;

    border-radius:8px;

    margin-bottom:20px;

}

</style>

</head>

<body>

<div class="login-box">

    <div class="logo">

        <i class="bi bi-person-circle"></i>

        <h2>Login</h2>
        
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">

        @csrf

        <div class="form-group">

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                class="form-control"
                value="{{ old('username') }}"
                required
                autofocus
            >

        </div>

        <div class="form-group">

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                required
            >

        </div>

        <button type="submit" class="btn-login">
            Login

        </button>

    </form>

</div>

</body>
</html>