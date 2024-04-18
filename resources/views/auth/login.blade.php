<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            /* Warna hitam untuk teks heading */
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
            color: #000000;
            /* Warna hitam untuk teks dalam class text */
        }
    </style>
</head>

<body>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2>Login</h2>

        <div class="text">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </div>
        <!-- Tautan ke halaman pendaftaran -->
        <p>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar sekarang</a></p>
    </form>

</body>

</html>
