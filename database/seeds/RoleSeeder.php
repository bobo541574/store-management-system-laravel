<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Staff'];

        if (count(DB::table('roles')->get()) == 0) {
            foreach ($roles as $role) {
                Role::create([
                    'name'  => $role,
                    'guard_name'    => 'web'
                ]);
            }
        }
        $user = User::where('name', 'Admin')->first();
        $user->syncRoles($roles);
    }
}