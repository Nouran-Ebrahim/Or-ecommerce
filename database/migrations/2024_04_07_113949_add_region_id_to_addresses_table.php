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
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id');
            $table->string('city')->nullable();
            $table->string('zone')->nullable();
            $table->string('block', 100)->nullable();
            $table->string('road', 100)->nullable();
            $table->string('building_no', 100)->nullable();
            $table->string('flat')->nullable();
            $table->string('floor_no', 100)->nullable();
            $table->string('apartment', 100)->nullable();
            $table->string('type')->nullable();
            $table->text('note')->nullable();
            $table->foreign('region_id', 'addresses_region_id_foreign')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
};
