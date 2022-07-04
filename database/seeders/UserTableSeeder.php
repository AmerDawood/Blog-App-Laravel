<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email','amer@gmail.com')->first();

        if(!$user){
        //   DB::ins([
        //     'name'=>'amer',
        //     'email'=>'amerma@gmail.com',
        //     'password'=>Hash::make('123456'),
        //     'role'=>'admin'
        //   ]);
        DB::table('users')->insert([
            'name' => 'amer ma',
            'email' => 'amerma@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'admin'
        ]);
        }
    }
}
