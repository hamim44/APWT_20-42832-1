<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            \App\Models\User::factory()->create([

                'username'=> 'user1',
                'password'=> '1234',
                'dob'=>'2000-04-24',
                'email'=> 'user@gmail.com'


            ]);
        }
}
