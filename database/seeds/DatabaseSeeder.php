<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Oğuzhan Yılmaz',
            'email' => 'ooguzhanyilmazz41@gmail.com',
            'password' => Hash::make('@Oguzhan41'),
            'created_at' => Carbon::now(),
        ]);
    }
}
