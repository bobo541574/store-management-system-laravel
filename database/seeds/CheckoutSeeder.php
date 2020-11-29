<?php

use Illuminate\Database\Seeder;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Checkout::class, 80)->create()->each(function ($checkout) {
            $checkout->order->toggleStatus()->save();
        });
    }
}