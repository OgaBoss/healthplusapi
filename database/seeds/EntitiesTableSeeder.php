<?php

use Illuminate\Database\Seeder;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $entity = ['hmo', 'hospital', 'pharmacy', 'subscribers', 'admin'];

        foreach($entity as $e){
            \DB::table('entities')->insert(
                [
                    'name' => $e
                ]
            );
        }

    }
}
