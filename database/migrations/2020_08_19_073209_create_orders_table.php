<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->timestamps();
            $table->enum('status', ['Under review', 'In progress', 'Completed']);
            $table->uuid('account_uuid')->index('account_order_idx');
            $table->foreign('account_uuid', 'account_order_fk')
                ->references('uuid')
                ->on('accounts')
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
        Schema::dropIfExists('orders');
    }
}
