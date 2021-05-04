<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'nama' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ],
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}