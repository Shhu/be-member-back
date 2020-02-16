<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'admin']);
    }
}
