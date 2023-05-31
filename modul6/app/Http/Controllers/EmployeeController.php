<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Employee List';
        // return view('employee.index', ['pageTitle' => $pageTitle]);

        // RAW SQL QUERY
        // $employees = DB::select('
        //     select *, employees.id as employee_id, positions.name as position_name
        //     from employees
        //     left join positions on employees.position_id = positions.id
        // ');

        // // Query Builder
        // $employees = DB::table('employees')
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
        //     ->get();

        // ELOQUENT
        // mengambil semua data karyawan dari tabel yang terkait dengan model "Employee".
        $employees = Employee::all();
        //  untuk mengembalikan tampilan (view) dengan nama 'employee.index'yang akan menampilkan data karyawan.
        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //  menampilkan judul halaman 'Create Employee'
        $pageTitle = 'Create Employee';
        // // RAW SQL Query
        // $positions = DB::select('select * from positions');

        // return view('employee.create', compact('pageTitle', 'positions'));

        // // Query Builder
        // $positions = DB::table('positions')->get();

        // ELOQUENT
        // mengambil semua data posisi jabatan dari tabel yang berhubungan dengan model "Position".
        $positions = Position::all();
        // untuk mengembalikan tampilan (view) dengan nama 'employee.create' yang akan menampilkan form pembuatan karyawan baru.
        return view('employee.create', compact('pageTitle', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // menghandle penyimpanan data karyawan baru setelah form pembuatan
    public function store(Request $request)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input
        $messages = [
            'required' => ':attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar.',
            'numeric' => 'Isi :attribute dengan angka.'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        // Jika terdapat kesalahan validasi, kembalikan kembali ke halaman sebelumnya dengan pesan kesalahan dan input yang diisi sebelumnya
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // // INSERT QUERY
        // DB::table('employees')->insert([
        //     'firstname' => $request->firstName,
        //     'lastname' => $request->lastName,
        //     'email' => $request->email,
        //     'age' => $request->age,
        //     'position_id' => $request->position,
        // ]);

         // ELOQUENT
        //  memeriksa apakah data yang diberikan sesuai dengan aturan validasi
            $employee = New Employee;
            $employee->firstname = $request->firstName;
            $employee->lastname = $request->lastName;
            $employee->email = $request->email;
            $employee->age = $request->age;
            $employee->position_id = $request->position;
        // ketika validasi berhasil data akan di simpan, $employee->save() digunakan untuk menyimpan data karyawan tersebut ke dalam database.
            $employee->save();
        /**
         * setelah data karyawan berhasil disimpan, pengguna akan diarahkan ke halaman indeks (daftar) karyawan menggunakan perintah
         * redirect()->route('employees.index'). Halaman ini diarahkan melalui rute dengan nama "employees.index".
         */

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    // function show menerima parameter $id
    public function show(string $id)
    {
        //judul halaman yang akan ditampilkan 'Employee Detail'
        $pageTitle = 'Employee Detail';
        // // RAW SQL QUERY
        // $employee = collect(DB::select('
        //     select *, employees.id as employee_id, positions.name as position_name
        //     from employees
        //     left join positions on employees.position_id = positions.id
        //     where employees.id = ?
        // ', [$id]))->first();

        // Query Builder
        // $employee = DB::table('employees')
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     // memiih semua kolom dari tabel employee dan memberikan nama alias
        //     ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
        //     ->where('employees.id', '=', $id)
        //     ->first();

        // ELOQUENT
        //  mencari data karyawan berdasarkan nilai parameter "$id". Metode find() digunakan untuk mencari record berdasarkan primary key-nya. Hasil query ini akan disimpan dalam variabel "$employee".
        $employee = Employee::find($id);

        // mengembalikan tampilan (view) dengan nama 'employee.show' dengan memanggil juga $pagetitle dan $employee
        return view('employee.show', compact('pageTitle', 'employee'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    // menampilkan halaman edit karyawan dengan ID tertentu
    public function edit(string $id)
    {
        // judul halaman "Edit Employee".
        $pageTitle = 'Edit Employee';

        // membuat Query Builder yang akan mengakses tabel employees
        // $employee = DB::table('employees')
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     // untuk memilih kolom yg akan diambil dari tabel employees
        //     ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
        //     // memastikkan bahwa id yang akan dituju sama dengan yang $id
        //     ->where('employees.id', '=', $id)
        //     ->first();

        // $positions = DB::table('positions')->get();
         // ELOQUENT
        // Mengambil semua data posisi (positions) dari model Position
        $positions = Position::all();
        // Mengambil data karyawan dengan ID yang sesuai
        $employee = Employee::find($id);
        // mengembalikan tampilan employee edit
        return view('employee.edit', compact('pageTitle', 'employee', 'positions'));


    }

    /**
     * Update the specified resource in storage.
     */
    // menyimpan perubahan data karyawan setelah dilakukan editing.
    public function update(Request $request, $id)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input
        $messages = [
            'required' => ':attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar.',
            'numeric' => 'Isi :attribute dengan angka.'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        // Jika terdapat kesalahan validasi, kembalikan kembali ke halaman sebelumnya dengan pesan kesalahan dan input yang diisi sebelumnya
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // UPDATE QUERY
        DB::table('employees')
            ->where('id', $id)
            ->update([
                'firstname' => $request->firstName,
                'lastname' => $request->lastName,
                'email' => $request->email,
                'age' => $request->age,
                'position_id' => $request->position,
            ]);

        return redirect()->route('employees.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data employees
        // QUERY BUILDER
        // DB::table('employees')
        // ->where('id', $id)
        // ->delete();

         // ELOQUENT
        // menghapus data karyawan berdasarkan ID
        Employee::find($id)->delete();
        // Setelah data karyawan berhasil dihapus, code ini akan mengarahkan ke halaman daftar karyawan
        return redirect()->route('employees.index');

    }
}
