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
        Schema::create('recolte_ventes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer("quantite_recoltee")->nullable();
            $table->integer("cout_recolte")->nullable();
            $table->integer("cout_secouage")->nullable();
            $table->integer("cout_vannage")->nullable();
            $table->integer("cout_transport")->nullable();
            $table->integer("quantite_autoconsommee")->nullable();
            $table->integer("quantite_vendue_ailleurs")->nullable();
            $table->integer("prix_vente_ailleurs")->nullable();
            $table->integer("quantite_vente_olvea")->nullable();
            $table->integer("prix_vente_olvea")->nullable();
            $table->integer("quantite_perdue")->nullable();
            $table->tinyInteger('main_oeuvre_familiale')->default('0')->comment('O=non, 1=oui');
            $table->integer("age_5_17_ans")->nullable();
            $table->integer("age_18_30_ans")->nullable();
            $table->integer("age_31_43_ans")->nullable();
            $table->integer("age_44_56_ans")->nullable();
            $table->integer("age_57_et_plus")->nullable();

            $table->foreignUuid('suite_production_id')->references('id')->on('suite_productions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recolte_ventes');
    }
};
