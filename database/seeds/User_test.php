<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class User_test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'usr_username' => 'test1',
            'usr_password' => Hash::make('test'),
            'usr_level' => 0,
            'usr_status' => 0
        ]);
    }
}
