<?php

use App\Models\Supplier;
use App\Models\NameTrait;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Supplier::create([
                'name'  => NameTrait::setName("Supplier", $i),
                'logo'  => "vendor.svg",
            ]);
        }
        // factory(App\Models\Supplier::class, 5)->create();
    }
}