<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
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
               'name'=>'admin7',
               'email'=>'admin7@gmail.com',
               'role_id'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'user7',
               'email'=>'user7@gmail.com',
               'role_id'=>'3',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'owner7',
                'email'=>'owner7@gmail.com',
                'role_id'=>'2',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'admin6',
                'email'=>'admin6@gmail.com',
                'role_id'=>'1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'user6',
                'email'=>'user6@gmail.com',
                'role_id'=>'3',
                'password'=> bcrypt('123456'),
             ],
             [
                 'name'=>'owner6',
                 'email'=>'owner6@gmail.com',
                 'role_id'=>'3',
                 'password'=> bcrypt('123456'),
              ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }


}
}
