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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 200)->nullable();
            $table->string('student_nom', 150)->nullable();
            $table->string('student_prenom', 150)->nullable();
            $table->string('student_adresse', 150)->nullable();
            $table->string('student_region', 255)->nullable();
            $table->string('sex', 150)->nullable();
            $table->string('student_email', 200)->nullable();
            $table->string('password', 200);
            $table->date('dateNaissance')->nullable();
            $table->string('lieuNaissance', 150)->nullable();
            $table->string('student_tel', 150)->nullable();
            $table->string('religion', 30)->nullable();
            $table->integer('etat_civil')->nullable();
            $table->string('nom_conjoint', 150)->nullable();
            $table->integer('nb_enfant')->nullable();
            $table->string('father_name', 150)->nullable();
            $table->string('father_prof', 40)->nullable();
            $table->string('mother_name', 150)->nullable();
            $table->string('mother_prof', 40)->nullable();
            $table->string('parent_adresse', 150)->nullable();
            $table->string('parent_tel', 150)->nullable();
            $table->string('nationalite', 30)->nullable();
            $table->string('num_cin', 20)->nullable();
            $table->string('pays_origine', 30)->nullable();
            $table->date('cin_date_delivre')->nullable();
            $table->string('cin_region', 30)->nullable();
            $table->string('num_visa', 20)->nullable();
            $table->string('pers_contact_name', 150)->nullable();
            $table->string('pers_adresse', 150)->nullable();
            $table->string('pers_tel', 150)->nullable();
            $table->string('etude_envisage', 150)->nullable();
            $table->string('etude_option', 150)->nullable();
            $table->string('sponsor_nom', 150)->nullable();
            $table->string('sponsor_prenom', 150)->nullable();
            $table->string('sponsor_adresse', 150)->nullable();
            $table->string('sponsor_tel', 150)->nullable();
            $table->string('sponsor_dure_f', 150)->nullable();
            $table->integer('externe')->nullable();
            $table->string('image_student', 255)->nullable();
            $table->string('status', 150)->nullable();
            $table->string('appartement', 150)->nullable();
            $table->string('situationf', 150)->nullable();
            $table->integer('etat')->nullable();
            $table->string('image', 150)->nullable();
            $table->string('lookup_code', 13)->nullable();
            $table->string('annee_etude', 40)->nullable();
            $table->integer('graduated')->nullable();
            $table->date('graduation_date')->nullable();
            $table->integer('bursary_status')->nullable();
            $table->integer('new_student')->nullable();
            $table->integer('type_retrait')->nullable();
            $table->date('retrait_date')->nullable();
            $table->string('champ', 20)->nullable();
            $table->string('bacc_serie', 10)->nullable();
            $table->string('annee_scolaire', 200);
            $table->string('period', 200);
            $table->string('date_entry', 100)->nullable();
            $table->string('last_change_user_id', 150)->nullable();
            $table->date('last_change_datetime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};