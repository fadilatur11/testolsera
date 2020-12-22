<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Fadilatur',
            'email' => 'fadilatur@gmail.com',
            'password' => bcrypt('acception')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Ario Baruna',
            'email' => 'ario@gmail.com',
            'password' => bcrypt('acception')
        ]);

        $user->assignRole('user');

    }
}
