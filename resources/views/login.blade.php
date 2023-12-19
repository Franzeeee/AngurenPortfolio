<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <nav>
        <div class="back" onclick="window.location.href='{{ route('home') }}'">
            <img src="{{ asset('img/arrow.png') }}" alt="">
            <p>Back</p>
        </div>
    </nav>
    <div class="container">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <legend>Login Here</legend>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="passwordInput" name="password" required autocomplete="off">
                <img src="{{ asset('img/hide.png') }}" id="eyeToggle" title="View Password" onclick="togglePasswordVisibility()">
            </div>
            <button name="submit">Login</button>
        </form>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>