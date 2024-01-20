<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            //? Para entendernos, las migraciones es el archivo en el cual se definen el tipo y el nombre de los atributos que va a tener la tabla clients
            $table->id();
            $table -> string('nombre');
            $table -> string('apellidos');
            $table -> string('telefono') ->  unique();
            $table -> string('email') -> unique();
            $table -> string('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
