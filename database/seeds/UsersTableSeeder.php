<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = factory(\Bemember\User\Models\User::class, 10)->create();
    }
}
