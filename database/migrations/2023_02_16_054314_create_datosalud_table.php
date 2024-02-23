<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosaluds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idpa');
            $table->double('peso');
            $table->double('estatura');
            $table->double('imc');
            $table->integer('edad');
            $table->string('sexo',50);
            $table->foreignId('idenf');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosaluds');
    }
};
