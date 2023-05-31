<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // membuat tabel positions dengan lima kolom di bawah ini di dalam schmema database phpmyadmin
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            // ini adalah primary key pada tabel positions
            $table->id();
            // tipe data string akan menyimpan kode posisi
            $table->string('code');
            // tipe data string akan menyimpan nama posisi
            $table->string('name');
            //tipe data string akan menyimpan deskripsi posisi
            $table->string('description');
            // menambah kolom created at dan updated at untuk melihat waktu pembuatan dan pembaruan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
