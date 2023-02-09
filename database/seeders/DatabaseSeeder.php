<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username'=>'user',
                'firstname'=>'user',
                'middlename'=>'user',
                'lastname'=>'user',
                'phonenumber'=>'09565634097',
                'password'=>bcrypt('password'),
                'role'=> 0
            ],
            [
                'username'=>'admin',
                'firstname'=>'admin',
                'middlename'=>'admin',
                'lastname'=>'admin',
                'phonenumber'=>'09565634097',
                'password'=>bcrypt('password'),
                'role'=> 1
            ],
            [
                'username'=>'superadmin',
                'firstname'=>'superadmin',
                'middlename'=>'superadmin',
                'lastname'=>'superadmin',
                'phonenumber'=>'09565634097',
                'password'=>bcrypt('password'),
                'role'=> 2
            ]
        ];
        foreach($user as $users)
        {
            User::create($users);
        }
    }
}