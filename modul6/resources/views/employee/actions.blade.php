<div class="d-flex">
    {{--  mengarahkan ke 'employees.show' dengan parameter 'employee' yang nilainya adalah ID dari karyawan,sehingga menampilkan detail karyawan ketika di tekan --}}
    <a href="{{ route('employees.show', ['employee' => $employee->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
    {{-- mengarahkan ke'employees.edit' untuk mengedit karyawan dengan parameter ID dari karyawan yang spesifik. sehingga menampilkan tampilan untuk mengedit data karyawan yang di tekan. --}}
    <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
