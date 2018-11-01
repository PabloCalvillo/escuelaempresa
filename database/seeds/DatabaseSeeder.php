<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(escuelaempresa\student::class, 70)->create();
        factory(escuelaempresa\User::class)->create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123456')]);
    }
}
