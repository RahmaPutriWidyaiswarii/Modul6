<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            //code dibawah ini akan menjadi primary key dalam tabel employees
            $table->id();
            // tipe data string akan menyimpan data firstname karyawan
            $table->string('firstname');
            // tipe data string akan menyimpan lastname karyawan dengan adanya opsi bawah nilai dari kolom ini dapat kosong
            $table->string('lastname')->nullable();
            // tipe data string akan menyimpan email karyawan dengan adanya opsu bahwa nilai dari kolom ini harus unik dan tidak bisa duplikat
            $table->string('email')->unique();
            // tipe data integer akan menyimpan umur(age) karyawan
            $table->integer('age');
            // foreign key ini akan menyimpan ID posisi (position) seorang karyawan dimana kolom akan dikaitkan (constrained) dengan kolom id pada tabel "positions". Dimana akan menunjukkan
            // bahwa adanya relasi antara tabel "employees" dan "positions", sehingga setiap karyawan terkait dengan satu posisi.
            $table->foreignId('position_id')->constrained();
            // menambah kolom created at dan updated at untuk melihat waktu pembuatan dan pembaruan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
