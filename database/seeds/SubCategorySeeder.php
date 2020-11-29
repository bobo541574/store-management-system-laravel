<?php

use App\Models\Category;
use App\Models\NameTrait;
use App\Models\SubCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            SubCategory::create([
                'category_id'   => $faker->randomElement(Category::pluck('id')->toArray()),
                'name'  => NameTrait::setName("Sub_Category", $i),
                'description'   => $faker->paragraph(2),
            ]);
        }
        // factory(App\Models\SubCategory::class, 5)->create();
    }
}