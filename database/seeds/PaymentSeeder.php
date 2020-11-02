<?php

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['KBZPay', 'AYAPay', 'CBPay', 'Wave Money', 'M - ပိုက်ဆံ', 'Cash'];

        if (!count(Payment::all())) {
            for ($i = 0; $i < count($name); $i++) {
                $color = new Payment();
                $color->name = $name[$i];
                $color->save();
            }
        }
    }
}