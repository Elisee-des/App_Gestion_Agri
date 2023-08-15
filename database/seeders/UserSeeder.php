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
        $users=[
            array('nom' => 'admin','prenom' => 'admin','email' => 'cordaid@gmail.com','email_verified_at' => now(),'password' => bcrypt('password'),'telephone' => '78704994','role'=>'Admin', 'remember_token' => Str::random(10)),
            ];

        foreach ($users as $user) {
            $user=User::create($user);
            
            
        }
    }
}
