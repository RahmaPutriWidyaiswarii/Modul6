<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**  code program ini akan memasukkan data ke dalam tabel "positions". Data yang dimasukkan adalah tiga array dbawah ini,
     * tiga posisi ini akan dimasukkan ke dalam tabel "positions".sehingga code program ini nantinya akan menambahkan tiga baris data ke dalam tabel "positions"*/
    public function run(): void
    {
        DB::table('positions')->insert([
            [
                'code' => 'FE',
                'name' => 'Front End Developer',
                'description' => 'Front End Developer'
            ],
            [
                'code' => 'BE',
                'name' => 'Back End Developer',
                'description' => 'Back End Developer'
            ],
            [
                'code' => 'SA',
                'name' => 'System Analist',
                'description' => 'System Analist'
            ],
        ]);
    }
}
