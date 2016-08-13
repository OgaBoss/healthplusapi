<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert(
            [
                'role_id' => 1,
                'entity_id' => 5,
                'email' => 'goshensoftinc@gmail.com',
                'password' => Hash::make('goshensoftinc@gmail.com'),
                'first_name' => 'Damilola',
                'last_name' => 'Adebayo',
                'activated' => 0,
            ]
        );
    }
}
