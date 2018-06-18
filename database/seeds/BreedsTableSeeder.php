<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$currentTime = date('Y-m-d H:i:s');
    	DB::table('breeds')->insert([
    	['id' => 1, 'name' => "Domestic", 'created_at'=> $currentTime, 'updated_at'=> $currentTime],
    	['id' => 2, 'name' => "Persian", 'created_at'=> $currentTime, 'updated_at'=> $currentTime],
    	['id' => 3, 'name' => "Siamese", 'created_at'=> $currentTime, 'updated_at'=> $currentTime],
    	['id' => 4, 'name' => "Abyssinan", 'created_at'=> $currentTime, 'updated_at'=> $currentTime]

    ]);
        //
    }
}
