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
        Schema::create('groupements', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("denomination");
            $table->string("lieu");
            $table->string("logo")->nullable();
            $table->string("telephone");
            $table->string("email");
            $table->foreignUuid('pays_id')->references('id')->on('pays');
            $table->foreignUuid('region_id')->references('id')->on('regions');
            $table->foreignUuid('province_id')->references('id')->on('provinces');
            $table->foreignUuid('faitiere_id')->references('id')->on('faitieres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupements');
    }
};
