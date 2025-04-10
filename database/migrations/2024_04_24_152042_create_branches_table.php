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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->on('countries')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->on('regions')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();

            $table->boolean('delivery')->default(1);
            $table->boolean('pickup')->default(1);
            $table->boolean('dinein')->default(1);

            $table->boolean('status')->default(1);
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
