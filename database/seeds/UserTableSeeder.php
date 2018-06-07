<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\User;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::truncate();
        User::create([
            'uuid' => Str::uuid(),
            'name' => "Adriel Admin",
            'email' => "awelterramos@gmail.com",
            'password' => bcrypt('adriel'),
            'role' => "admin",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "Adriel User1",
            'email' => "awelterramos1@gmail.com",
            'password' => bcrypt('adriel'),
            'role' => "user",
        ]);
        User::create([
            'uuid' => Str::uuid(),
            'name' => "Adriel User2",
            'email' => "awelterramos2@gmail.com",
            'password' => bcrypt('adriel'),
            'role' => "user",
        ]);
    }

}
