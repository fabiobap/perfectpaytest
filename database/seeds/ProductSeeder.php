<?php

use App\Product;
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
        $productsCount = max((int)$this->command->ask('Quantos produtos?', 10),1);

        factory(Product::class, $productsCount)->make()->each(function ($product){
            $product->save();
        });
    }
}
