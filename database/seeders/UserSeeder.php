<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingUsers = User::all();

        if ( $existingUsers->isEmpty() ) {
            $user           = new User;
            $user->userid   = env('USER_ID');
            $user->name     = env('USER_NAME');
            $user->email    = env('USER_EMAIL');
            $user->password = Hash::make(env('USER_PASSWORD'));
            $user->save();
        }
    }
}
