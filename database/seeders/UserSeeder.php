<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'role'=>'admin',
            'phone'=>'03452152724',
            'address'=>"City Railway colony",
            'status'=>'active',
        ]);

    User::create([
            'fname'=>'User',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user123'),
            'role'=>'user',
            'phone'=>'03452000024',
            'address'=>"Gulshan",

            'status'=>'active',
        ]);
    }
}
