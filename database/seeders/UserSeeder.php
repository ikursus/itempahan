<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cipta akaun user menggunakan Query Builder
        // User 1
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@localhost.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123'),
        ]);

        // Cara 2 menggunakan Eloquent ORM (Model) - new Object
        $user2 = new User;
        $user2->name = 'User 2';
        $user2->email = 'user2@localhost.com';
        $user2->password = bcrypt('pass123');
        $user2->save();

        // Cara 3 menggunakan Eloquent ORM (Model) - method create
        User::create([
            'name' => 'User 3',
            'email' => 'user3@localhost.com',
            'password' => bcrypt('pass123'),
        ]);
    }
}
