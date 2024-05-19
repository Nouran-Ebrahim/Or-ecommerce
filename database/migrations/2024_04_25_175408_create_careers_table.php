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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id');
            $table->foreign('vacancy_id')->on('vacancies')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('phone');
            $table->string('email');
            $table->string('phone_code')->default('+973');
            $table->string('code')->default('BH');
            $table->string('country_code')->default('BH');
            $table->text('address')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
