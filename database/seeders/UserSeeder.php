<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        User::truncate();
        $users =  [
            [
                'name' => 'Daniar Nur Amin',
                'email' => 'daniar@gmail.com',
                'password' => Hash::make('daniar'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(60),
            ],
            [
                'name' => 'Supri',
                'email' => 'supri@gmail.com',
                'password' => Hash::make('supri'),
                'remember_token' => Str::random(60),
            ]
          ];
          DB::table('users')->insert($users);
          //User::insert($users);
    }
}
