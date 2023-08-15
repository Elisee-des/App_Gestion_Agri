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
        Schema::create('suite_productions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer("cout_semis_en_ligne")->nullable();
            $table->integer("cout_demarage")->nullable();
            $table->integer("cout_repiquage")->nullable();
            $table->integer("cout_premier_sarclage")->nullable();
            $table->integer("cout_second_sarclage")->nullable();
            $table->integer("cout_troisieme_sarclage")->nullable();
            $table->integer("cout_epandage_engais")->nullable();
            $table->integer("cout_traitement_phyto")->nullable();
            $table->integer("nombre_parcelles")->nullable();

            $table->foreignUuid('production_id')->references('id')->on('productions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suite_productions');
    }
};
