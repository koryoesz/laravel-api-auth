<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Shoes;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('size');
            $table->string('price');
            $table->timestamps();
        });

        Shoes::create([
            'name'  => 'Nike shoe',
            'size' => '38',
            'price' => '20000'
        ]);

        Shoes::create([
            'name'  => 'Addidas shoe',
            'size' => '38',
            'price' => '45000'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoes');
    }
}
