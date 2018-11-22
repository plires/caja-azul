<?php

use Illuminate\Database\Seeder;

use App\Category;
use App\ProductImage;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$categories = factory(Category::class, 2)->create();
    	$categories->each(function($c){
    		$products = factory(Product::class, 10)->make();
    		$c->products()->saveMany($products);


    		$products->each(function($p){

                ProductImage::create([
                    'image'        => \Faker\Factory::create()->imageUrl(300, 300),
                    'featured'     => 1,
                    'product_id'   => $p->id
                ]);
		      
    			$images = factory(ProductImage::class, 3)->make();
    			$p->images()->saveMany($images);

    		});
    	});

    }
}