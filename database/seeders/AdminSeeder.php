<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'     => 'Administrator',
            'email'    => 'admin@dwnet.id',
            'role'    => 'admin',
            'password' => bcrypt('wew12345'),
        ]);

        Admin::create([
            'name'     => 'NOC',
            'email'    => 'noc@dwnet.id',
            'role'    => 'noc',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'name'     => 'Teknisi',
            'email'    => 'teknisi@dwnet.id',
            'role'    => 'teknisi',
            'password' => bcrypt('password'),
        ]);
    }
}
