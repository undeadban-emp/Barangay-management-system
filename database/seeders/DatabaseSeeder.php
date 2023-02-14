<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Region;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipality;
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
                'account_level'=> 0,
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

        $region = [
            [
                'description'=>'Caraga Region'
            ]
        ];
        foreach($region as $regions)
        {
            Region::create($regions);
        }

        $province = [
            [
                'description'=>'Surigao del Sur'
            ]
        ];
        foreach($province as $provinces)
        {
            Province::create($provinces);
        }

        $municipalities = [
            [
                'description'=>'Madrid'
            ]
        ];
        foreach($municipalities as $municipalitiess)
        {
            Municipality::create($municipalitiess);
        }

        $Barangay = [
            [
                'description'=>'Patong-patong'
            ]
        ];
        foreach($Barangay as $Barangays)
        {
            Barangay::create($Barangays);
        }


    }
}