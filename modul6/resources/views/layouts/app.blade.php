
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    {{--  memanggil dan menyertakan file dengan nama nav.blade.php. Ini merupakan salah satu fitur dari framework yang digunakan untuk mengatur tata letak halaman secara modular.  --}}
    @include('layouts.nav')
    {{-- suatu tempat untuk mengisi konten --}}
    @yield('content')
    {{-- menghubungkan file JavaScript dengan halaman ini --}}
    @vite('resources/js/app.js')
</body>
</html>

