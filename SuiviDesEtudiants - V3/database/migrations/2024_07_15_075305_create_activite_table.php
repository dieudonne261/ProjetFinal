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
        Schema::create('activite', function (Blueprint $table) {
            $table->id();
            $table->string('idActivite');
            $table->string('Type');
            $table->string('Responsable');
            $table->string('Cible');
            $table->text('Description')->nullable();
            $table->string('Rapportfilepath')->nullable();
            $table->date('DateDebut');
            $table->date('DateFin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activite');
    }
};
