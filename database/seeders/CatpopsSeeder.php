<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catpop;
class CatpopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catpop::create([
            'nama'     => 'Pusat',
        ]);
        Catpop::create([
            'nama'     => 'Server',
        ]);
        Catpop::create([
            'nama'     => 'Converter',
        ]);
        Catpop::create([
            'nama'     => 'Wireless',
        ]);
        Catpop::create([
            'nama'     => 'ODF',
        ]);
        Catpop::create([
            'nama'     => 'ODP',
        ]);
        Catpop::create([
            'nama'     => 'ODC',
        ]);
        Catpop::create([
            'nama'     => 'JB',
        ]);
        Catpop::create([
            'nama'     => 'Roset',
        ]);

    }
}
