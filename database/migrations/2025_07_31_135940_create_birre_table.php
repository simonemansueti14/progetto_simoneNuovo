<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('birre', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo');
            $table->decimal('gradazione', 4, 2);
            $table->integer('ibu')->nullable();
            $table->integer('ebc')->nullable();
            $table->text('descrizione')->nullable();
            $table->string('contenitore')->nullable();
            $table->string('formato')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('birre');
    }
};
