<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
            'user_no' => 'BITVERSEADMIN',
            'lastname' => 'Support',
            'firstname' => 'Bitverse',
            'username' => 'BITVERSEADMIN',
            'email' => 'admin@bitversecorp.com',
            'password' => bcrypt('12password34'),
            'remember_token' => null,
            'is_pos' => 0,
    	]);
    }
}
