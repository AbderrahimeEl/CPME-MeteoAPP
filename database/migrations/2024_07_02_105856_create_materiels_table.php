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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('localisation');
            $table->string('constructeur');
            $table->string('type');
            $table->string('n_serie');
            $table->string('n_inventaire');
            $table->string('n_marchee');
            $table->date('date_mise_service');
            $table->string('intervention');
            $table->timestamps();
            $table->binary('image')->nullable();  // Image stored as BLOB
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
