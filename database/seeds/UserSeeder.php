<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create();

        $user = User::where('name', 'Admin')->get();
        if (!count($user)) {
            User::create([
                'uid'   => 'UID' . rand(1000, 9999),
                'name' => "Admin",
                'email' => 'admin.home@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'profile'   => 'user.png',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}