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
    public function run()
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

        factory(App\Models\ProductAttribute::class, 160)->make();
    }
}