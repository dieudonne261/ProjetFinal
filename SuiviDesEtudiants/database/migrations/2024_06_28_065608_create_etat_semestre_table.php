<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('etat_semestre', function (Blueprint $table) {
            $table->id();
            $table->integer('IdSemestre');
            $table->string('NomSemestre');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_semestre');
    }
};
