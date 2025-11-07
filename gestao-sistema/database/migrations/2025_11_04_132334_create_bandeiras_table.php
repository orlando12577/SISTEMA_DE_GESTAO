<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bandeiras', function (Blueprint $table) {
            if (!Schema::hasColumn('bandeiras', 'grupo_economico_id')) {
                $table->foreignId('grupo_economico_id')
                      ->nullable()
                      ->constrained('grupo_economicos')
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bandeiras', function (Blueprint $table) {
            if (Schema::hasColumn('bandeiras', 'grupo_economico_id')) {
                $table->dropConstrainedForeignId('grupo_economico_id');
            }
        });
    }
};
