<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');


        });

        User::create([
            'role_id' => '1',
            'name'  => 'Yomi kolawole',
            'email' => 'koryoesz@gmail.com',
            'password' => bcrypt('saturday')
        ]);

        User::create([
            'role_id' => '2',
            'name'  => 'Musa',
            'email' => 'Musa@gmail.com',
            'password' => bcrypt('saturday1')
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
