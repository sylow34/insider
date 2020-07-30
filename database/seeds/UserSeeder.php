<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Gökhan',
            'surname' => 'YENER',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'phone_number' => '905550000000',
            'organisation_id' => 1,
            'status' => 1,
            'role' => 1,
            'theme' => 1,
            'confirmed_at' => \Carbon\Carbon::now(),
        ]);
    }
}
