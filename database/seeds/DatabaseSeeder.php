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
        factory(escuelaempresa\grade::class, 10)->create();
        factory(escuelaempresa\company::class, 20)->create();
        factory(escuelaempresa\User::class)->create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123456')]);
        factory(escuelaempresa\petition::class, 50)->create();
    }
}
