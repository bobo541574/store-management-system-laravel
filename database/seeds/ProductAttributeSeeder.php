<?php

use App\Models\Product;
use App\Models\SizeAttribute;
use Faker\Generator as Faker;
use App\Models\ColorAttribute;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        if (count(DB::table('color_attributes')->get()) == 0) {
            $name = ['White', 'Black', 'Gray', 'Yellow', 'Orange', 'Red', 'Blue', 'Puple', 'Pink'];

            if (!count(ColorAttribute::all())) {
                for ($i = 0; $i < count($name); $i++) {
                    $color = new ColorAttribute();
                    $color->name = $name[$i];
                    $color->color_code = 'null';
                    $color->save();
                }
            }
        }

        if (count(DB::table('size_attributes')->get()) == 0) {
            $letter = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
            $number = ['20-24', '25-28', '29-32', '33-36', '37-40', '41-44', '13\' 2"', '14\' 5"', '15\' 6"'];

            if (!count(SizeAttribute::all()))
                for ($i = 0; $i < count($number); $i++) {
                    $size = new SizeAttribute();
                    $size->letter    = $letter[$i] ?? null;
                    $size->number    = $number[$i];
                    $size->save();
                }
        }

        for ($i = 0; $i < 200; $i++) {
            $product_id = $faker->randomElement(Product::pluck('id')->toArray());
            $product = ProductAttribute::where('product_id', $product_id)->first();
            $arrived = Product::find($product_id)->arrived;

            $price = rand(2500, 20000);

            if ($price > 2500 && $price < 5000) {
                $cost = $price - 500;
            } else if (($price > 5001 && $price < 10000)) {
                $cost = $price - 1000;
            } else if (($price > 10001 && $price < 15000)) {
                $cost = $price - 2000;
            } else if (($price > 15001 && $price <= 20000)) {
                $cost = $price - 3000;
            } else {
                $cost = $price - 300;
            }

            ProductAttribute::create([
                'product_id'    => $product_id,
                'photo'   => json_encode(["photo_2020-10-16_20-34-37.jpg", "photo_2020-10-16_20-34-37.jpg"]),
                'color_attribute_id' => $faker->randomElement(ColorAttribute::pluck('id')->toArray()),
                'size_attribute_id'    => $faker->randomElement(SizeAttribute::pluck('id')->toArray()),
                'quantity'    => rand(1, 20),
                'price'   => $product->price ?? $price,
                'cost'   => $product->cost ?? $cost,
                'arrived'   => $arrived,
                'description'    => $faker->paragraph(2),
            ]);
        }
        // factory(App\Models\ProductAttribute::class, 50)->make();
    }
}