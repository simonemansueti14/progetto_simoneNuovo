<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prenotazioni', function (Blueprint $table) {
            $table->id();
            $table->date('giorno');        // data della prenotazione
            $table->time('orario');        // orario
            $table->integer('posti');      // numero di posti
            $table->string('nome');        // nome della persona
            $table->string('note')->nullable(); // note opzionali
            $table->timestamps();          // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prenotazioni');
    }
};
