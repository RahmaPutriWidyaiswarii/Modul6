<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    {{-- background warna navbar--}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            {{-- Berikut adalah rute untuk menuju home di halam profile, serta tidak hanya itu menambahkan class dengan ikon . selain itu juga mengatur ukuran warna dan ikon--}}
            <a href="{{ route('home') }} "class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>
            {{-- untuk mengatur bagian button serta membuat hamburger sehingga web terlihat lebih responsive ketika ukuran layar berubah"--}}
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{--membuat hamburger menjadi responsiv ketika di klik --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-n-50">
                {{-- berikut ini adalah navbar --}}
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link">Employees List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">
                {{-- untuk mengatur jika menekan button myprofile akan menuju ke halaman profile--}}
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>
        {{-- code program dibawah ini adalah isi dari halaman profile, dimana akan ada text. selain itu
            untuk mengatur ukuran, warna,tempat text dann ikon tambahan. --}}
        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="bi-house-fill me-3 fs-1"></div>
            <h4 class="mb-0">Well done! this is {{ $pageTitle }}.</h4>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
