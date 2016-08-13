<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = ['super_admin','admin', 'subscriber', 'doctor', 'clerk'];

        foreach($role as $e){
            \DB::table('roles')->insert(
                [
                    'name' => $e,
                    'description' => ''
                ]
            );
        }
    }
}
