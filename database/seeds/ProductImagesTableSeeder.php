<?php

use Illuminate\Database\Seeder;

use App\ProductImage;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductImage::class, 100)->create();
    }
}
