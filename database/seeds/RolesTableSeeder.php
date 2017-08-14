<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomDate = date('Y-m-d H:i:s', mt_rand(1262055681,1645619256));

        DB::table('roles')->insert([
           'name' => 'member',
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);

        DB::table('roles')->insert([
           'name' => 'admin',
           'created_at' => $randomDate,
           'updated_at' => $randomDate
        ]);
    }
}
