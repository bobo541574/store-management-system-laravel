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
        // (count(DB::table('users')->get()) > 0) ? DB::table('users')->truncate() : '';
        // (count(DB::table('model_has_roles')->get()) > 0) ? DB::table('model_has_roles')->delete() : '';
        // // (count(DB::table('roles')->get()) > 0) ? DB::table('roles')->truncate() : '';
        // (count(DB::table('suppliers')->get()) > 0) ? DB::table('suppliers')->truncate() : '';
        // (count(DB::table('categories')->get()) > 0) ? DB::table('categories')->truncate() : '';
        // (count(DB::table('sub_categories')->get()) > 0) ? DB::table('sub_categories')->truncate() : '';
        // (count(DB::table('contacts')->get()) > 0) ? DB::table('contacts')->truncate() : '';
        // (count(DB::table('brands')->get()) > 0) ? DB::table('brands')->truncate() : '';
        // (count(DB::table('products')->get()) > 0) ? DB::table('products')->truncate() : '';
        // // (count(DB::table('color_attributes')->get()) > 0) ? DB::table('color_attributes')->truncate() : '';
        // // (count(DB::table('size_attributes')->get()) > 0) ? DB::table('size_attributes')->truncate() : '';
        // (count(DB::table('product_attributes')->get()) > 0) ? DB::table('product_attributes')->truncate() : '';
        // (count(DB::table('orders')->get()) > 0) ? DB::table('orders')->truncate() : '';
        (count(DB::table('checkouts')->get()) > 0) ? DB::table('checkouts')->truncate() : '';


        $this->call([
            // UserSeeder::class,
            // RoleSeeder::class,
            // SupplierSeeder::class,
            // CategorySeeder::class,
            // SubCategorySeeder::class,
            // BrandSeeder::class,
            // ContactSeeder::class,
            // ProductSeeder::class,
            // ColorAttributeSeeder::class,
            // SizeAttributeSeeder::class,
            // ProductAttributeSeeder::class,
            // PaymentSeeder::class,
            // OrderSeeder::class,
            CheckoutSeeder::class,
        ]);
    }
}