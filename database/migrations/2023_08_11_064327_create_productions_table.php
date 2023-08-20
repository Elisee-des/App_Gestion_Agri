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
        Schema::create('productions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("type_culture");
            $table->integer("bio_quantite_semences")->nullable();
            $table->integer("bio_cout_semences")->nullable();
            $table->integer("bio_quantite_fo")->nullable();
            $table->integer("bio_cout_fo")->nullable();
            $table->integer("bio_quantite_fertinova")->nullable();
            $table->integer("bio_cout_fertinova")->nullable();
            $table->integer("bio_quantite_autres_fertilisants")->nullable();
            $table->integer("bio_cout_autres_fertilisants")->nullable();
            $table->integer("bio_quantite_pesticide_bio")->nullable();
            $table->integer("bio_cout_pesticide_bio")->nullable();
            $table->integer("bio_quantite_farine_nem")->nullable();
            $table->integer("bio_cout_farine_nem")->nullable();
            $table->integer("bio_quantite_huile_nem")->nullable();
            $table->integer("bio_cout_huile_nem")->nullable();
            $table->integer("bio_quantite_fongicide")->nullable();
            $table->integer("bio_cout_fongicide")->nullable();
            $table->integer("bio_quantite_autres_produits_phyto")->nullable();
            $table->integer("bio_cout_autres_produits_phyto")->nullable();
            $table->integer("conv_quantite_uree")->nullable();
            $table->integer("conv_cout_uree")->nullable();
            $table->integer("conv_quantite_npk")->nullable();
            $table->integer("conv_cout_npk")->nullable();
            $table->integer("conv_quantite_autres_fertilisants")->nullable();
            $table->integer("conv_cout_autres_fertilisants")->nullable();
            $table->integer("conv_quantite_herbicide")->nullable();
            $table->integer("conv_cout_herbicide")->nullable();
            $table->integer("conv_cout_planage_sols")->nullable();
            $table->integer("conv_cout_labour_sols")->nullable();

            $table->foreignUuid('producteur_id')->references('id')->on('producteurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
