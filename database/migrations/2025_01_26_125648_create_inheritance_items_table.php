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
        Schema::create('inheritance_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inheritance_certificate_id');
            $table->string('name_bn');
            $table->string('name_en');

            $table->string('relation_en');
            $table->string('relation_bn');
            $table->timestamps();
            $table->foreign('inheritance_certificate_id')->references('id')->on('inheritance_certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inheritance_items');
    }
};
