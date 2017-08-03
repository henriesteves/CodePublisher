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
        factory(\CodePublisher\User::class, 1)->create([
            'name' => 'Admin',
            'email' => 'admin@editora.com',
            'password' => bcrypt('123456')
        ]);

        factory(\CodePublisher\User::class, 1)->create([
            'name' => 'Author',
            'email' => 'author@editora.com',
            'password' => bcrypt('123456')
        ]);
    }
}
