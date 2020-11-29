<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (count(DB::table('users')->get()) > 0) ? DB::table('users')->delete() : '';
        (count(DB::table('model_has_roles')->get()) > 0) ? DB::table('model_has_roles')->delete() : '';
        (count(DB::table('roles')->get()) > 0) ? DB::table('roles')->delete() : '';
        (count(DB::table('checkouts')->get()) > 0) ? DB::table('checkouts')->delete() : '';
        (count(DB::table('orders')->get()) > 0) ? DB::table('orders')->delete() : '';
        (count(DB::table('product_attributes')->get()) > 0) ? DB::table('product_attributes')->delete() : '';
        (count(DB::table('products')->get()) > 0) ? DB::table('products')->delete() : '';
        (count(DB::table('brands')->get()) > 0) ? DB::table('brands')->delete() : '';
        (count(DB::table('sub_categories')->get()) > 0) ? DB::table('sub_categories')->delete() : '';
        (count(DB::table('categories')->get()) > 0) ? DB::table('categories')->delete() : '';
        (count(DB::table('contacts')->get()) > 0) ? DB::table('contacts')->delete() : '';
        (count(DB::table('suppliers')->get()) > 0) ? DB::table('suppliers')->delete() : '';
        // (count(DB::table('color_attributes')->get()) > 0) ? DB::table('color_attributes')->truncate() : '';
        // (count(DB::table('size_attributes')->get()) > 0) ? DB::table('size_attributes')->truncate() : '';


        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            SupplierSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BrandSeeder::class,
            ContactSeeder::class,
            ProductSeeder::class,
            ProductAttributeSeeder::class,
            PaymentSeeder::class,
            OrderSeeder::class,
            CheckoutSeeder::class,
            // ColorAttributeSeeder::class,
            // SizeAttributeSeeder::class,
        ]);
    }
}