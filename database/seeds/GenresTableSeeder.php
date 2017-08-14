<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $randomDate = date('Y-m-d H:i:s', mt_rand(1262055681,1645619256));

      DB::table('genres')->insert([
         'name' => 'Roller-Coaster',
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('genres')->insert([
         'name' => 'Transport Ride',
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('genres')->insert([
         'name' => 'Gentle Ride',
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('genres')->insert([
         'name' => 'Thrill Ride',
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('genres')->insert([
         'name' => 'Water Ride',
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);
    }
}
