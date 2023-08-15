<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            array('nom' => 'admin', 'prenom' => 'admin', 'email' => 'cordaid@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '78704994', 'role' => 'Admin', 'remember_token' => Str::random(10)),
            array('nom' => 'Bamoni', 'prenom' => 'jean', 'email' => 'bamoni@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '68568899', 'role' => 'RSCI', 'remember_token' => Str::random(10)),
            array('nom' => 'Zongo', 'prenom' => 'Herver', 'email' => 'herver@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '56346534', 'role' => 'CI', 'remember_token' => Str::random(10)),
            array('nom' => 'Ouedraogo', 'prenom' => 'Adama', 'email' => 'adama@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '76456576', 'role' => 'CI', 'remember_token' => Str::random(10)),
            array('nom' => 'Kabore', 'prenom' => 'Aline', 'email' => 'aline@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '56885567', 'role' => 'RSCI', 'remember_token' => Str::random(10)),
            array('nom' => 'Tapsoba', 'prenom' => 'Safiatou', 'email' => 'safiatou@gmail.com', 'email_verified_at' => now(), 'password' => bcrypt('password'), 'telephone' => '66567867', 'role' => 'CI', 'remember_token' => Str::random(10)),
        ];

        foreach ($users as $user) {
            $user = User::create($user);
        }
    }
}
