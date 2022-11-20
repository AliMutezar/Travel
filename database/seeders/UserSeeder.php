<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"  =>  "Ali Mutezar",
            "email" =>  "aamutezar@gmail.com",
            "password"  => bcrypt('12345'),
            "roles" =>  "ADMIN",
        ]);

        User::create([
            "name"  =>  "Sahira Salsabila",
            "email" =>  "sahira@gmail.com",
            "password"  => bcrypt('12345'),
            "roles" =>  "USER",
        ]);
    }
}
