<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User;
        $user->name = "test";
        $user->email = "test2@gmail.com";
        $user->password = bcrypt('123456789');
        $user->role = "admin";
        $user->office_id = 1;
        $user->save();
    }
}
