<?php

use App\Models\Category;
use App\Models\NameTrait;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'name'  => NameTrait::setName("Category", $i),
                'description'   => $faker->paragraph(2),
            ]);
        }
        // factory(App\Models\Category::class, 5)->create();
    }
}