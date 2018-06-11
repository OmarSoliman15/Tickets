<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TicketsTableSeeder::class);

        $this->command->warn("Admin Informations :");
        $this->command->table(['name', 'email', 'password'], [
            [
                'name' => 'OmarSoliman',
                'email' => 'omarsolimandev@gmail.com',
                'password' => 'secret',
            ],
        ]);
    }
}
