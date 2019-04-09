<?php

use App\Models\User;
use App\Models\Session;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->states('admin')->create();
        factory(Session::class, 10)->create();
    }
}
