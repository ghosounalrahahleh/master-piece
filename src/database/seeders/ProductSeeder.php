<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                'name'         => 'product1',
                'description'  => 'description',
                'is_new'       => 1,
                'is_onSale'    => 1,
                'price'        => 15,
                'sale_price'   => 10,
                'tag'          => 'tag',
                'color'        => 'color',
                'size'         => 's',
                'quantity'     => '50',
                'owner_id  '    => 3,
                'category_id ' => 1,

            ],

        ];

        foreach ($user as $key => $value) {
            Product::create($value);
        }
    }
}
