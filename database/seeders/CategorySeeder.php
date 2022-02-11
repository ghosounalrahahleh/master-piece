<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'art',
                'image' => 'images/1643999131signup-image.PNG',
            ],
            [
                'name' => 'drawing',
                'image' => 'images/1643999131signup-image.PNG',
            ],
            [
                'name' => 'paper',
                'image' => 'images/1643999131signup-image.PNG',
            ],
        ];

        foreach ($user as $key => $value) {
            Category::create($value);
        }
    }
}
