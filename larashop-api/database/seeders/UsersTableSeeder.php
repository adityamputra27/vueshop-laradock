<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) { 
            $avatar_path = '/var/www/larashop-api/public/images/users';
            $avatar_fullpath = $faker->image($avatar_path, 200, 250, 'people', true, true, 'people');
            $avatar = str_replace($avatar_path . '/' , '', $avatar_fullpath);
            $users[$i] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' =>  bcrypt('123456'),
                'roles' => json_encode(['CUSTOMER']),
                'avatar' => $avatar,
                'status' => 'ACTIVE',
                'created_at' => Carbon::now()
            ];
        }
        DB::table('users')->insert($users);
    }
}
