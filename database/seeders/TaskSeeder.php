<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Task::create([
            'subject'     => 'PSB an Ryan',
            'desc'     => 'Pesebe paket dengan lokasi pelanggan',
            'report'     => '166500',
            'level'     => 'low',
            'status'     => 'open',
            'cattask_id'     => '1',
            'petugas_id'     => '1',
            'pelanggan_id'     => '2',
        ]);
    }
}
