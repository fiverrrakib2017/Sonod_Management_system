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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upozila_id');
            $table->unsignedBigInteger('union_id');

            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('village');
            $table->string('ward_no');
             $table->text('birth_no');
            $table->date('birth_date');
            $table->date('provide_date');
            $table->timestamps();


            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->foreign('upozila_id')->references('id')->on('upozilas')->onDelete('cascade');

            $table->foreign('union_id')->references('id')->on('unions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};
