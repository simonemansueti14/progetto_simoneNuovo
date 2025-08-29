<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('prenotazioni', function (Blueprint $table) {
            if (!Schema::hasColumn('prenotazioni', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
            }

            $table->foreign('user_id', 'prenotazioni_user_id_fk')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->index(['giorno', 'orario'], 'prenotazioni_giorno_orario_idx');
            $table->index('user_id', 'prenotazioni_user_id_idx');
        });
    }

    public function down(): void
    {
        Schema::table('prenotazioni', function (Blueprint $table) {
            if (Schema::hasColumn('prenotazioni', 'user_id')) {
                try { $table->dropForeign('prenotazioni_user_id_fk'); } catch (\Throwable $e) {}
                try { $table->dropIndex('prenotazioni_user_id_idx'); } catch (\Throwable $e) {}
            }
            try { $table->dropIndex('prenotazioni_giorno_orario_idx'); } catch (\Throwable $e) {}
        });
    }
};
