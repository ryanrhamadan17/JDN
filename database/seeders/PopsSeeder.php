<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pop;
class PopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pop::create([
            'nama'     => 'Pusat',
            'desc'    => 'Pop Pusat JDN bandung',
            'lat'    => '-6.992090',
            'long'    => '107.841979',
            'catpop_id' => '1',
        ]);
        Pop::create([
            'nama'     => 'POP Cikopo',
            'desc'    => 'POP converter yang berlokokasi di rumah wa atik',
            'lat'    => '-6.9826549',
            'long'    => '107.8432983',
            'catpop_id' => '2',
        ]);
        Pop::create([
            'nama'     => 'POP Sinapel ',
            'desc'    => 'POP Sinapel di pasir menggunakan media listrik solar panel',
            'lat'    => '-6.984149',
            'long'    => '107.861214',
            'catpop_id' => '3',
        ]);
    }
}
