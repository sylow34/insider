<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert(['name' => 'Barcelona']);
        DB::table('clubs')->insert(['name' => 'Real Madrid']);
        DB::table('clubs')->insert(['name' => 'Juventus']);
        DB::table('clubs')->insert(['name' => 'Bayern München']);
    }
}
