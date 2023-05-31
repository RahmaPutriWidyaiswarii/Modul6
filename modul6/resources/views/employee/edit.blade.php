@extends('layouts.app')

@section('content')

    {{-- isi konten --}}
    <div class="container-sm mt-5">
        {{-- buat form, dengan data yang akan dikirim ke route employee.store dengan metode POST --}}
        <form action="{{ route('employees.update', $employee -> id) }}" method="POST">
            {{-- menerapkan CSRF sebagai keamanan data --}}
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        {{-- form pada First Name --}}
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            {{-- input data Firs Name --}}
                            {{-- @error('age') is-invalid @enderror digunakan untuk penanda pada inputan yang tidak valid dan terjadi kesalahan--}}
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" value="{{ $employee->firstname }}" placeholder="Enter Last Name">
                            {{-- menampilakan pesan inputan First Name ketika terjadi kesalahan--}}
                            @error('firstName')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" value="{{ $employee->lastname }}" placeholder="Enter Last Name">
                            @error('lastName')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $employee->email }}" placeholder="Enter Email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ $employee->age }}" placeholder="Enter Age">
                            @error('age')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- membuat label employee baru dengan bagian nama position --}}
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            {{--  tombol Cancel yang akan diarahkan ke route employees.index --}}
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"> Cancel</i></a>
                        </div>
                        <div class="col-md-6 d-grid">
                            {{-- tombol update yang menunjukkan bahwa data pada form akan di edit --}}
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
