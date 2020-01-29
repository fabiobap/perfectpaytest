<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->integer('quantity');
            $table->integer('discount');
            $table->integer('saleAmount');
            $table->enum('status',['cancelados','vendidos','devoluções']);
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();

            $table->foreign('product_id')
            ->references('id')->on('products');
            $table->foreign('customer_id')
            ->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
