<?php

use App\Models\SizeAttribute;
use Illuminate\Database\Seeder;

class SizeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}