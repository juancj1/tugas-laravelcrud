<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserTbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User; 
        $admin->name = 'Admin'; 
        $admin->email = 'admin@local.test'; 
        $admin->password = Hash :: make('rare123');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User; 
        $user->name = 'User'; 
        $user->email = 'user@local.test'; 
        $user->password = Hash :: make('rare123');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

    }
}
