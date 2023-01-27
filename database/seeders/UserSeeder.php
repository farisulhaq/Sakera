<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@sakera.com',
            'password' => bcrypt('adminkppn2023'),
        ]);

        $role = Role::create(['name' => 'admin']);

        $user->roles()->attach($role->id);
    }
}
