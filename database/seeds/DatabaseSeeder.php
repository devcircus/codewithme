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
        $admin = factory(User::class)->states('admin')->create();

        factory(Session::class, 3)->create(['creator_id' => $admin->id]);

        $sessions = factory(Session::class, 10)->create();

        $admin->pairedSessions()->sync([2, 4, 6]);
    }
}
