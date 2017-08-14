<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomDate = date('Y-m-d H:i:s', mt_rand(1262055681,1645619256));

        DB::table('users')->insert([
           'first_name' => 'Cedric',
           'last_name' => ' Dhooge',
           'email' => 'cedric.dhooge@student.odisee.be',
           'password' => Hash::make('Azerty123'),
           'roles_id' => 1,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);

        DB::table('users')->insert([
           'first_name' => 'Joris',
           'last_name' => ' Maervoet',
           'email' => 'joris.maervoet@odisee.be',
           'password' => Hash::make('Azerty123'),
           'roles_id' => 2,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);

        DB::table('users')->insert([
           'first_name' => 'Kevin',
           'last_name' => ' Picalausa',
           'email' => 'kevin.picalausa@odisee.be',
           'password' => Hash::make('Azerty123'),
           'roles_id' => 1,
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);
    }
}
