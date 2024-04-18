<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            /* Warna biru untuk latar belakang form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            height: 500px;
        }

        h2 {
            text-align: center;
            color: #000000;
            /* Warna putih untuk teks heading */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #000000;
            /* Warna putih untuk teks label */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 4px;
            background-color: #ecf0f1;
            /* Warna biru muda untuk latar belakang input field */
        }

        button {
            background-color: #000000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #000000;
        }

        .text {
            color: #ffffff;
            /* Warna putih untuk teks dalam class text */
        }
    </style>
</head>

<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('auth.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <h2 class="text-center">FORM REGISTER USER</h3>
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="login#">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>

</html>
