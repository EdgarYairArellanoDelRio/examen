<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class nombreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla')->insert([
            'nombre_real' => 'chevy chase',
            'nombre_pelicula' => 'clark griswold',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'beverly Dangelo',
            'nombre_pelicula' => 'ellen griswold',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'Randy quaid',
            'nombre_pelicula' => 'primo eddie',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'johnny galecki ',
            'nombre_pelicula' => 'russell griswold',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'jliette Lewis',
            'nombre_pelicula' => 'audrey griswold',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'julia louis dreyfus',
            'nombre_pelicula' => 'margo chester',
        ]);
        DB::table('tabla')->insert([
            'nombre_real' => 'nicolette scorsese',
            'nombre_pelicula' => 'mary',
        ]);
    }
}
