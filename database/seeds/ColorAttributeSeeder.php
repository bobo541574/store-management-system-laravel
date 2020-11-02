<?php

use App\Models\ColorAttribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}