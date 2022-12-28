<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cattask;
class CattaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cattask::create([
            'nama'     => 'Survei',
        ]);
        Cattask::create([
            'nama'     => 'PSB',
        ]);
        Cattask::create([
            'nama'     => 'Perbaikan',
        ]);
        Cattask::create([
            'nama'     => 'Pencabutan',
        ]);
        Cattask::create([
            'nama'     => 'Backbone',
        ]);
    }
}
