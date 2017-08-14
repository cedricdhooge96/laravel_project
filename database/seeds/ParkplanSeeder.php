<?php

use Illuminate\Database\Seeder;

class ParkplanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomDate = date('Y-m-d H:i:s', mt_rand(1262055681,1645619256));

        DB::table('parkplans')->insert([
           'name' => 'Eerste plan',
           'users_id' => 1,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);

        DB::table('parkplans')->insert([
           'name' => 'Tweede plan',
           'users_id' => 1,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);

        DB::table('parkplans')->insert([
           'name' => 'Maervoets plan',
           'users_id' => 2,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);
    }
}
