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
        /*User::create([
        	'username' => 'admin',
        	'password' => bcrypt('hunter22'),
        	'is_admin' => true,]);
        User::create([
        	'username' => 'scott',
        	'password' => bcrypt('tiger'),
        	'is_admin' => false,]);*/
        $currentTime = date('Y-m-d H:i:s');
    	DB::table('users')->insert([
    	['id' => 1, 'name' => "user", 'email' => 'user@gmail.com', 'password' =>bcrypt('1234'), 'created_at'=> $currentTime, 'updated_at'=> $currentTime ],
    	['id' => 2, 'name' => "admin", 'email' => 'admin@gmail.com', 'password' =>bcrypt('1235'), 'created_at'=> $currentTime, 'updated_at'=> $currentTime ],
    	['id' => 3, 'name' => "super.admin", 'email' => 'super.admin@gmail.com', 'password' =>bcrypt('1236'), 'created_at'=> $currentTime, 'updated_at'=> $currentTime ]
    	
    ]);
    }
}
