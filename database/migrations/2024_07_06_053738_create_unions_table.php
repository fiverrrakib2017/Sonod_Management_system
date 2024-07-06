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
        Schema::create('unions', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
	        $table->unsignedBigInteger('upozila_id');
            $table->string('union_website');
            $table->string('union_email');
            $table->string('union_name_bn');
            $table->string('union_name_en');
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('upozila_id')->references('id')->on('upozilas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unions');
    }
};
