<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marketing;
class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marketing::create([
            'nama'     => 'System',
            'alamat'     => 'Kantor JDN',
            'telepon'     => '08997104111',
        ]);
        Marketing::create([
            'nama'     => 'Yuki',
            'alamat'     => 'Ciayunan',
            'telepon'     => '08997104111',
        ]);
        Marketing::create([
            'nama'     => 'Rohendi',
            'alamat'     => 'Kantor JDN',
            'telepon'     => '08997104111',
        ]);
    }
}
