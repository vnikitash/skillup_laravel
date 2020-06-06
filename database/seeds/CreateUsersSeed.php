<?php

use Illuminate\Database\Seeder;

class CreateUsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        for ($i = 1; $i < 20000; $i++) {
            $users[] = [
                'email' => md5($i) . rand(1, 1000000) . "@dfk.com",
                'password' => 'a',
                'name' => 'Dummy User'
            ];

        }
        \App\Models\User::insert($users);
    }
}
