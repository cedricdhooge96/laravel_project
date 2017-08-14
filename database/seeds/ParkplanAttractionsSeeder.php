<?php

use Illuminate\Database\Seeder;

class ParkplanAttractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attraction_parkplan')->insert([
           'attraction_id' => 1,
           'parkplan_id' => 1
        ]);

        DB::table('attraction_parkplan')->insert([
           'attraction_id' => 5,
           'parkplan_id' => 1
        ]);

        DB::table('attraction_parkplan')->insert([
           'attraction_id' => 3,
           'parkplan_id' => 2
        ]);

        DB::table('attraction_parkplan')->insert([
           'attraction_id' => 9,
           'parkplan_id' => 3
        ]);
    }
}
