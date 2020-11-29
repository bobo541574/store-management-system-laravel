<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\NameTrait;
use App\Models\SubCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use NameTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $subcategory_id = $faker->randomElement(SubCategory::pluck('id')->toArray());
            $brand_id = $faker->randomElement(Brand::pluck('id')->toArray());
            $supplier_id = $faker->randomElement(Supplier::pluck('id')->toArray());
            $arrived = $faker->dateTimeBetween('2020-04-01', '2020-11-30');

            $product = Product::create([
                'subcategory_id'  => $subcategory_id,
                'brand_id'  => $brand_id,
                'supplier_id'   => $supplier_id,
                'product_code'  => 'PID-' . $brand_id . '-' . $supplier_id . '-' . ($brand_id + $supplier_id),
                'name'  => NameTrait::setName("Product", $i),
                'arrived'   => $arrived,
            ]);
        }

        // factory(\App\Models\Product::class, 10)->make();
    }
}