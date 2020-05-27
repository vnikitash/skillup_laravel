<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new \App\Models\User();
        $user->name = "Viktor";
        $user->email = "viktor+100@gmail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("admin");
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \App\Models\User::query()->where('email', "viktor+100@gmail.com")->first();

        $user->delete();
    }
}
