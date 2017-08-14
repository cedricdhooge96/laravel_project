<?php

use Illuminate\Database\Seeder;

class AttractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $randomDate = date('Y-m-d H:i:s', mt_rand(1262055681,1645619256));
      $faker = Faker\Factory::create();

      DB::table('attractions')->insert([
         'name' => "Space Mountain",
         'description' => "Put your setbelts on and get ready for fase two: an ehanced cannon fomr the world of Jules Verne speed of light.",
         'genres_id' => 1,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Buzz Lightyear Laser Blast",
         'description' => "Blast off into space and help Buzz defeat Zurg in this intergalactic laser-shooting gallery.",
         'genres_id' => 2,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Space travelers",
         'description' => "Travel together with your companions to the vast areas in space.",
         'genres_id' => 3,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Rocket launch",
         'description' => "Have fun on this road to space with the new american shuttle xxD3.",
         'genres_id' => 1,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Black hole",
         'description' => "Prepare yourself to enter the black hole as first in the world.",
         'genres_id' => 1,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Orbitron",
         'description' => "Pilot your very own spaceship high in the sky above Discoveryland amid a gleaming universe of orbiting planets.",
         'genres_id' => 4,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Alien landing",
         'description' => "Will you hide or accept the incoming alien force.",
         'genres_id' => 5,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Space drillings",
         'description' => "Explore how the futuristic human civilization retrieves materials from asteroids.",
         'genres_id' => 2,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Survivals",
         'description' => "Surivive with lance the incoming asteroids.",
         'genres_id' => 4,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);

      DB::table('attractions')->insert([
         'name' => "Typhoon",
         'description' => "Go to the fancy rollercoaser called typhoon with its vertical downfall.",
         'genres_id' => 1,
         'created_at' => $randomDate,
         'updated_at' => $randomDate
      ]);
    }
}
