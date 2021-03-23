<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   DB::table('users')->insert(
            [
                [
                    'fname'=>'Admin',
                    'lname'=>'Admin',
                    'email'=>'admin@admin.com',
                    'phone_number'=>'03002323230',
                    'is_admin'=>'1',
                    'password'=> bcrypt('123456'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'fname'=>'User',
                    'lname'=>'User',
                    'email'=>'user@user.com',
                    'phone_number'=>'03002323210',
                    'is_admin'=>'0',
                    'password'=> bcrypt('123456'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
