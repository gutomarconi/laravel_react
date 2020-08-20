<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->timestamps();
            $table->uuid('order_uuid')->index('orderproduct_order_idx');
            $table->uuid('product_uuid')->index('orderproduct_product_idx');
            $table->float('install_fee');
            $table->float('rental_fee');
            $table->float('total');
            $table->foreign('order_uuid', 'orderproduct_order_fk')
                ->references('uuid')
                ->on('orders')
                ->onUpdate('NO ACTION')
                ->onDelete('cascade');
            $table->foreign('product_uuid', 'orderproduct_product_fk')
                ->references('uuid')
                ->on('products')
                ->onUpdate('NO ACTION')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
