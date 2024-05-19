<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->on('delivries')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->on('clients')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->nullable()->on('addresses')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id')->nullable()->on('payments')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('sub_total', 9, 3)->nullable()->default(0);

            $table->decimal('discount', 9, 3)->nullable()->default(0);
            $table->integer('discount_percentage')->nullable()->default(0);

            $table->decimal('vat', 9, 3)->nullable()->default(0);
            $table->integer('vat_percentage')->nullable()->default(0);

            $table->decimal('coupon', 9, 3)->nullable()->default(0);
            $table->string('coupon_text')->nullable();
            $table->integer('coupon_percentage')->nullable()->default(0);

            $table->decimal('charge_cost', 9, 3)->nullable()->default(0);

            $table->decimal('net_total', 9, 3)->nullable()->default(0);

            $table->integer('status')->nullable()->default(0);
            $table->integer('follow')->nullable()->default(0);

            $table->boolean('use_points')->nullable()->default(0);
            $table->integer('points_number')->nullable()->default(0);
            $table->integer('gained_points')->nullable()->default(0);
            $table->integer('client_points')->nullable()->default(0);

            $table->string('mobile_type')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->nullable()->on('orders')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->nullable()->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->nullable()->on('colors')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')->nullable()->on('sizes')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('price', 8, 3)->nullable();
            $table->smallInteger('quantity');
            $table->decimal('total', 9, 3)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
}
