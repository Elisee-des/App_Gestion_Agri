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
        Schema::create('producteurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("nom");
            $table->string("prenom");
            $table->string("sexe");
            $table->string("telephone");
            $table->string("date_naissance");
            $table->string("age");
            $table->string("village");
            $table->string("situation_matrimoniale");
            $table->integer("nombre_enfant");
            $table->string("localisation");
            $table->mediumText("photo");
            $table->foreignUuid('groupement_id')->references('id')->on('groupements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producteurs');
    }
};
