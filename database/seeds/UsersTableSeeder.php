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
        factory(\App\Models\Admin::class)->create([
            'name' => 'OmarSoliman',
            'email' => 'omarsolimandev@gmail.com',
        ]);

        factory(\App\Models\Admin::class, 2)->create();
        factory(\App\Models\User::class, 3)->create();
    }
}
