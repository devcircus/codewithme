<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's users table.
     */
    public function run()
    {
        $this->createDefaultAdmin();
    }

    /**
     * Seed the application's users table.
     *
     * @return \App\Models\User
     */
    public function createDefaultAdmin()
    {
        return factory(User::class)->create([
            'name' => config('auth.admin.name'),
            'email' => config('auth.admin.email'),
            'password' => bcrypt(config('auth.admin.password')),
        ]);
    }
}
