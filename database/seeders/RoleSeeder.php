<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'role'=>'Admin',

            ],
            [
               'role'=>'Owner',

            ],
            [
                'role'=>'User',

             ],
        ];

        foreach ($user as $key => $value) {
            Role::create($value);
        }
    }
}
