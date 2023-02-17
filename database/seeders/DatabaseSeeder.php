<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Zone;
use App\Models\Purok;
use App\Models\Region;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Certificate;
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
                'role'=> 0,
                'region_id'=> 1,
                'province_id'=> 1,
                'municipality_id'=> 1,
                'barangay_id'=> 1,
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
        $purok = [
            [
                'barangay_id'=> 1,
                'description'=>'Purok-1',
            ],
            [
                'barangay_id'=> 2,
                'description'=>'Purok-2',
            ],
            [
                'barangay_id'=> 3,
                'description'=>'Purok-3',
            ]
        ];
        foreach($purok as $puroks)
        {
            Purok::create($puroks);
        }

        $zone = [
            [
                'purok_id'=> 1,
                'description'=>'zone 1',
            ],
            [
                'purok_id'=> 2,
                'description'=>'zone 2',
            ],
            [
                'purok_id'=> 3,
                'description'=>'zone 3',
            ]
        ];
        foreach($zone as $zones)
        {
            Zone::create($zones);
        }

        $certificate = [
            [
                'description'=>'Certification',
                'heading'=>'OFFICE OF THE PUNONG BARANGAY',
            ],
            [
                'description'=>'Barangay Certification',
                'heading'=>'OFFICE OF THE PUNONG BARANGAY',
            ],
            [
                'description'=>'Barangay Business Permit',
                'heading'=>'OFFICE OF THE PUNONG BARANGAY',
            ],
            [
                'description'=>'Barangay Clearance (Business)',
                'heading'=>'OFFICE OF THE PUNONG BARANGAY',
            ],
            [
                'description'=>'Sumbong (Complaint)',
                'heading'=>'BUHATAN SA LUPONG TAGAPAMAYAPA',
            ],
            [
                'description'=>'Pahibalo Alang sa Husay (Mediation)',
                'heading'=>'BUHATAN SA LUPONG TAGAPAMAYAPA',
            ]
        ];
        foreach($certificate as $certificates)
        {
            Certificate::create($certificates);
        }
    }
}
