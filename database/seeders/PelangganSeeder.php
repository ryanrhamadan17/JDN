<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use Faker\Factory as Faker;
class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 10000; $i++) { 

            Pelanggan::create([
            'nik'     => $faker->nik,
            'nama'    => $faker->name,
            'tlp'    => $faker->phoneNumber,
            'alamat'    => $faker->address,
            'status'    => '0',
            'lat'    => '-6.992090',
            'long'    => '107.841979',
            'paket_id' => '1',
            'marketing_id' => '1',
        ]);
        }
        // Pelanggan::create([
        //     'nik'     => '3204251911910006',
        //     'nama'    => 'Firman Mulyawijaya',
        //     'tlp'    => '08997114111',
        //     'alamat'    => 'Kebona Kapas',
        //     'status'    => '0',
        //     'lat'    => '-6.992090',
        //     'long'    => '107.841979',
        //     'paket_id' => '1',
        //     'marketing_id' => '1',
        // ]);
        // Pelanggan::create([
        //     'nik'     => '3204251911880001',
        //     'nama'    => 'Salim Sumairi',
        //     'tlp'    => '08978999999',
        //     'alamat'    => 'Cinta asih cicalengka wetan',
        //     'status'    => '0',
        //     'lat'    => '-6.992090',
        //     'long'    => '107.841979',
        //     'paket_id' => '2',
        //     'marketing_id' => '2',
        // ]);
    }
}
