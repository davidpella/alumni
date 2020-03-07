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
        factory(\App\User::class)->create([
            "name" => "Administrator",
            "email" => "admin@alumni.ac.tz",
            "role" => "admin",
            "permissions" => [
                "users_create" => true,
                "users_edit" => true,
                "users_delete" => true,
                "users_view" => true,
                "users_block" => true,
                "users_unblock" => true,
            ],
        ]);
    }
}
