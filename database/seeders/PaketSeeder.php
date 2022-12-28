<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;
class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama'     => 'Nethome 5Mbps',
            'speed'     => '5Mbps',
            'harga'     => '166500',
        ]);
        Paket::create([
            'nama'     => 'Nethome 10Mbps',
            'speed'     => '10Mbps',
            'harga'     => '222000',
        ]);
        Paket::create([
            'nama'     => 'Nethome 15Mbps',
            'speed'     => '15Mbps',
            'harga'     => '275000',
        ]);
        Paket::create([
            'nama'     => 'Nethome 5Mbps',
            'speed'     => '20Mbps',
            'harga'     => '299000',
        ]);
    }
}
