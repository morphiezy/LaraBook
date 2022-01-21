<!DOCTYPE html>
<html>
<head>
    <title>Larabook | CRUD 8020190028</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  
<div class="container">
    <div class="logo">
        <img src="{{asset('image/logo.svg')}}" alt="logo">
    </div>
    <p class="description-text">Hello 😁 selamat datang di larabook , ini merupakan latihan kedua saya menggunakan laravel dimana saya menerapkan CRUD pada aplikasi library buku ini.</p>

    @yield('content')
</div>
   
</body>
</html>