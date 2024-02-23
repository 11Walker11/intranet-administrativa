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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombrep',30);
            $table->string('apellidop',400);
            $table->string('apellidom',400);
            $table->integer('edad');
            $table->string('estado',400);
            $table->string('correo',400);
            $table->string('telefono',400);
            $table->string('calle',400);
            $table->string('colonia',400);
            $table->string('activo',2);
            $table->integer('noexp');
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
        Schema::dropIfExists('pacientes');
    }
};
