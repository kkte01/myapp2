<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'name' => sprintf('%s %s', Str::random(3), Str::random(4)),
//            'email' => Str::random(10).'@example.com',
//            'password' => bcrypt('password')
//        ]);
        User::factory()->count(5)->create();
    }
}
