<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Admin::factory()->create([

            'username'=> 'admin',
            'password'=> '1234',
            'email'=> 'Teacher@gmail.com'


        ]);
    }
}
