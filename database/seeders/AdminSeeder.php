<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User;
        $admin->name = 'admin';
        $admin->email= 'admin@gmail.com';
        $admin->role= 'admin';
        $admin->password = bcrypt('admin');
        $admin->save();
    }
}
