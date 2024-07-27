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
        Schema::create('membre_users', function (Blueprint $table) {
            $table->id();
            $table->string('IdMembres');
            $table->string('Matricule');
            $table->string('Role');
            $table->date('DateAjout');
            $table->date('DateRetire')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_users');
    }
};
