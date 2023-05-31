{{-- meng-extend layout pada 'layouts.app'. Dengan menggunakan @extends, ini akan menggunakan tampilan layout yang telah ditentukan dalam file 'layouts.app'. Layout tersebut biasanya berisi struktur umum halaman seperti header, footer, dan bagian konten yang dapat digunakan oleh berbagai halaman. --}}
@extends('layouts.app')
{{-- mendefinisikan sebuah section dengan nama 'content'. Section ini akan memuat konten spesifik yang akan ditampilkan di dalam layout--}}
@section('content')
{{--  meng-include file blade dengan nama 'default'. File blade ini akan dimasukkan ke dalam section 'content' yang telah didefinisikan sebelumnya. Isi dari file blade 'default' akan ditampilkan di bagian konten halaman sesuai dengan struktur layout yang telah ditentukan. --}}
    @include('default')
{{-- untuk mengakhiri section yang telah didefinisikan sebelumnya dengan @section. --}}
@endsection
