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
        Schema::create('inheritance_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upozila_id');
            $table->unsignedBigInteger('union_id');
            $table->unsignedBigInteger('post_office_id');
            $table->unsignedBigInteger('village_id');
            $table->string('ward');
            $table->string('name_bn');
            $table->string('name_en');

            $table->string('father_name_bn');
            $table->string('father_name_en');

            $table->string('mother_name_bn');
            $table->string('mother_name_en');
            $table->string('nid_or_birth');
            $table->string('birth_date');
            $table->string('photo');

            $table->string('investigation_person_name');
            $table->string('application_name_bn');
            $table->string('application_name_en');
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->foreign('upozila_id')->references('id')->on('upozilas')->onDelete('cascade');

            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade');

            $table->foreign('post_office_id')->references('id')->on('post_offices')->onDelete('cascade');

            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inheritance_certificates');
    }
};
