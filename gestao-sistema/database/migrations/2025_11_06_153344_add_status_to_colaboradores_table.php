<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::table('colaboradores', function (Blueprint $table) {
        $table->enum('status', ['ativo', 'inativo'])->default('ativo');
    });
}

public function down()
{
    Schema::table('colaboradores', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
