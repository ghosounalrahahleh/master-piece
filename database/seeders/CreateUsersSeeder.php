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
               'name'=>'gh',
               'email'=>'admin@gmail.com',
               'role_id'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'user',
               'email'=>'user@gmail.com',
               'role_id'=>'3',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'owner',
                'email'=>'owner@gmail.com',
                'role_id'=>'2',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'admin2',
                'email'=>'admin2@gmail.com',
                'role_id'=>'1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'user2',
                'email'=>'user2@gmail.com',
                'role_id'=>'3',
                'password'=> bcrypt('123456'),
             ],
             [
                 'name'=>'owner2',
                 'email'=>'owner2@gmail.com',
                 'role_id'=>'2',
                 'password'=> bcrypt('123456'),
              ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }


}
}
